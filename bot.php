<?php

include "vk_api.php"; 


const VK_KEY = "4c7c4a65814a392538ff59a21e0d7fc0a64b481593bb7ff561c5e399964650dd6c20df933d3f47acedbce";  // Токен сообщества
const ACCESS_KEY = "8062794c";  
const VERSION = "5.81";


$vk = new vk_api(VK_KEY, VERSION); 
$data = json_decode(file_get_contents('php://input')); 

if ($data->type == 'confirmation') { 
    exit(ACCESS_KEY); 
}
$vk->sendOK(); 

$id = $data->object->from_id; 
$message = $data->object->text; 

if ($data->type == 'message_new') {

    if ($message == '!бот') {

            $vk->sendMessage($id, "Привет :-)");
			
        }


	}
	