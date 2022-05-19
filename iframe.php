<?php

require_once 'lib.php';

$contextName = 'IFRAME';
require_once 'user-context-loader.inc.php';

$app = AppInstance::loadApp($accountId);
$infoMessage = $app->infoMessage;
$store = $app->store;

$isSettingsRequired = $app->status != AppInstance::ACTIVATED;

if ($isAdmin) {
    $stores = jsonApi()->stores();
    $storesValues = [];
    foreach ($stores->rows as $v) {
        $storesValues[] = $v->name;
    }
}

require 'iframe.html.php';

//$ch = curl_init('https://online.moysklad.ru/api/remap/1.2/entity/webhook');
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);
//curl_setopt($ch, CURLOPT_USERPWD, "admin@sloudel15:goodmorning22");
