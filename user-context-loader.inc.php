<?php

$contextKey = $_GET['contextKey']; // получили contextKey от МС в момент нажатия на кнопку настроить
loginfo($contextName ?: "IFRAME", "Loaded iframe with contextKey: $contextKey"); // 
$employee = vendorApi()->context($contextKey); // получение инфы о пользователе

$uid = $employee->uid; // сохранение инфы о пользователе
$fio = $employee->shortFio;
$accountId = $employee->accountId;

$isAdmin = $employee->permissions->admin->view;

