<?php
class vk_api{
  
    private $token = '';
    private $v = '';
   
    public function __construct($token, $v){
        $this->token = $token;
        $this->v = $v;
    }
    
    public function sendDocMessage($sendID, $id_owner, $id_doc){
        if ($sendID != 0 and $sendID != '0') {
            return $this->request('messages.send',array('attachment'=>"doc". $id_owner . "_" . $id_doc,'user_id'=>$sendID));
        } else {
            return true;
        }
    }

    public function sendMessage($sendID,$message){
        if ($sendID != 0 and $sendID != '0') {
            return $this->request('messages.send',array('message'=>$message, 'peer_id'=>$sendID));
        } else {
            return true;
        }
    }

    public function sendOK(){
        echo 'ok';
        $response_length = ob_get_length();

        if (is_callable('fastcgi_finish_request')) {

            session_write_close();
            fastcgi_finish_request();

            return;
        }

        ignore_user_abort(true);

        ob_start();
        $serverProtocole = filter_input(INPUT_SERVER, 'SERVER_PROTOCOL', FILTER_SANITIZE_STRING);
        header($serverProtocole.' 200 OK');
        header('Content-Encoding: none');
        header('Content-Length: '. $response_length);
        header('Connection: close');

        ob_end_flush();
        ob_flush();
        flush();
    }

}
