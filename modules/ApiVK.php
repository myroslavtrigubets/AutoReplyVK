<?php
require_once 'Errors.php';

class ApiVK extends Errors
{
    public $token;

    public function  __construct($token)
    {
        $this->token = $token;
    }

	public function api($method, $parametrs)
	{
		$getApi = $this->curl('https://api.vk.com/method/'.$method.'?'.$parametrs.'&v=5.52');
		return json_decode($getApi, true);
	}
	private function curl($url, $post = false)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		if ($post) {
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		}
		$response = curl_exec ($ch);
		curl_close($ch);
		return $response;
	}

    /**
     *
     * @return mixed массив с данными сообщения.
     */
	public function getMessage()
	{
		$getMessage = $this->getErrors($this->api('messages.get','access_token='.$this->token.'&count=1'));
		return $getMessage;
	}
    /**
     *
     * @return mixed массив с данными сообщения.
     */
	public function sendMessage($id, $message)
	{	$message = urlencode($message);
		$sendMessage = $this->getErrors($this->api(
		    'messages.send','access_token='.$this->token.'&user_id='.$id.'&message='.$message));
		return $sendMessage;
	}

}