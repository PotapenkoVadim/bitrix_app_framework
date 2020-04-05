<?php
require_once (__DIR__.'/core/Core.php');
$newApp = new Core();
$user = $newApp->callCrest('call', 'calendar.event.get', array('type' => 'user', 'ownerId' => '1', 'section' => '3', 'from' => '2020-02-21', 'to' => '2020-02-21'));
$newApp->render('test', 'table');