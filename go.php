<?php
require_once 'ApiVK.php';
require_once 'config.php';
require_once 'Answer.php';

while (true) {
	sleep(2);
    $go = new ApiVK($config['token']);
    $answer = new Answer();
    $message = $go->getMessage();
    $getAnswer = $answer->getAnswer($message['body'], $dictionary);
    if ($getAnswer){
        $uniqid = uniqid();
        $go->sendMessage($message['user_id'], $getAnswer);
        $go->sendMessage($config['yourid'], $uniqid);
        print PHP_EOL.'The message is successfully delivered.'.PHP_EOL;
    }
}
