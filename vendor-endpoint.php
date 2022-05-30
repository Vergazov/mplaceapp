<?php

require_once 'lib.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'];

loginfo("MOYSKLAD => APP", "Received: method=$method, path=$path"); //  получили

$pp = explode('/', $path);
$n = count($pp);
$appId = $pp[$n - 2];
$accountId = $pp[$n - 1];

loginfo("MOYSKLAD => APP", "Extracted: appId=$appId, accountId=$accountId"); //извлекли

$app = AppInstance::load($appId, $accountId); // создаем экземпляр класса AppInstance, сохранили в него $appId, $accountId

$replyStatus = true;

switch ($method) {
    case 'PUT':
        $requestBody = file_get_contents('php://input'); // сохранили тело запроса

        loginfo("MOYSKLAD => APP", "Request body: " . print_r($requestBody, true));

        $data = json_decode($requestBody); // сделали тело запроса объектом php
        
        $appUid = $data->appUid; // сохранили $appUid из тела запроса
        $accessToken = $data->access[0]->access_token; // сохранили $accessToken из тела запроса

        loginfo("MOYSKLAD => APP", "Received access_token: appUid=$appUid, access_token=$accessToken)");

        if (!$app->getStatusName()) {
            $app->accessToken = $accessToken; // сохранили в AppInstance accessToken 
            $app->status = AppInstance::SETTINGS_REQUIRED; /* инициализировали переменную status в  AppInstance. Присвоили значение
             *  равное контанте AppInstance::SETTINGS_REQUIRED = 1
             */
            $app->persist(); /* создаем файл и сохраняем в нем состояние приложения. В него попали все переменные класса AppInstance
             * с их текщими значениями
             */
        }
        break;
    case 'GET':
        break;
    case 'DELETE':
        $app->delete();
        $replyStatus = false;
        break;
}

if (!$app->getStatusName()) {
    http_response_code(404);
} else if ($replyStatus) {
    header("Content-Type: application/json");
    echo '{"status": "' . $app->getStatusName() . '"}';
}


