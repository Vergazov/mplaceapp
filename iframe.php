<?php

require_once 'lib.php';

$contextName = 'IFRAME';
require_once 'user-context-loader.inc.php'; // получаем информацию о пользователе который установил приложение

$app = AppInstance::loadApp($accountId); // создаем экземпляр AppInstance и сохраняем в него $accountId и appId
$infoMessage = $app->infoMessage; // создаем переменную для сообщения
$store = $app->store; //создаем переменную для склада

$isSettingsRequired = $app->status != AppInstance::ACTIVATED; /* если они не равны, то будет true, значит настройки нужны,
 *  если равны, то будет false значит не нужны
 */

if ($isAdmin) { // получаем список складов
    $stores = jsonApi()->stores();
    $storesValues = [];
    foreach ($stores->rows as $v) {
        $storesValues[] = $v->name;
    }
}

require 'iframe.html.php'; // подгружаем html вертску

