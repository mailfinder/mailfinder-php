<?php
/**
 * use
 * $mf = new Mailfinder\Api('key');
 * $r = $mf->validate('email');
 * return false if error or json 
 */
namespace Mailfinder;

class Api{
	public $apikey;
	private $url = "http://api.mailfinder.io/v1/verify/";
	private $maxtime = "30";

	public function __construct($key){
		$this->apikey = $key;
	}

	public function setMaxTime($time){
		$this->maxtime = $time;
	}

	public function validate($email){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $this->url."email=".$email."&apikey=".$this->apikey,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => $this->maxtime,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET"
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  $this->status="error";
		  return false;
		} else {
		  $this->status="done";
		  return json_decode($response);
		}
	}
}
