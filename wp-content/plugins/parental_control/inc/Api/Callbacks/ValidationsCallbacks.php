<?php 
/**
 * @package  AlecadddPlugin
 */
namespace HBVSoft\Pcpc\Inc\Api\Callbacks;

use HBVSoft\Pcpc\Inc\Base\BaseController;

class ValidationsCallbacks extends BaseController
{


	public function string($value,$name,$options=[]){
		$status = True;
		$message = "is-valid";
		if(!is_string($value)){
			$status = False;
			$message = "parameter $name should be a string";
			return [$status,'message'=>$message]; 
		}
		if(isset($options["min"]) && strlen($value) < $options["min"]){
			$status = False;
			$message = "parameter $name should have at least ".$options["min"]." length";
			return [$status,'message'=>$message];
		}

		if(isset($options["max"]) && strlen($value) > $options["max"]){
			$status = False;
			$message = "parameter $name should not be longer than ".$options["max"];
			return [$status,'message'=>$message];
		}

		if(isset($options["patern"]) && !preg_match($options["patern"],$value)){
			$status = False;
			$message = "parameter $name patern is incurrect ";
			return [$status,'message'=>$message];
		}
		return [$status,'message'=>$message];
	}

	public function email($value,$name,$options=[]){
		$value = strtolower($value);
		$patern='/^[a-z][a-z0-9\.\-_]{2,32}+\@[0-9a-z]+\.([0-9a-z]+\.)?[0-9a-z\-_]+$/';
		if(!preg_match($patern,$value)){
			$status = False;
			$message = "invalid email pattern for $name";
			return [$status,'message'=>$message];
		}
		return [True,'message'=>'is-valid'];

	}

	private function uniqueMobile($mobile){
		$users = get_users(array(
			'meta_key' => 'mobile',
			'meta_value' => $mobile,
		));
	
		return count($users) === 0;
	}

	public function mobile($value,$name,$options=[]){
		$patern='/^09[0-9]+$/';
		if(!preg_match($patern,$value)){
			$status = False;
			$message = "invalid mobile number pattern for $name";
			return [$status,'message'=>$message];
		}
		if((!isset($options["unique"]) || $options["unique"]) && !$this->uniqueMobile($value)){
			return[False,"message"=>"$name is exists"];
		}
		return [True,'message'=>'is-valid'];
	}

	public function national_id($value,$name,$options=[]){
		$value = str_replace("-", "", $value);
		if (!preg_match('/^\d{10}$/', $value)) {
			return [false,'message'=>"National id should contains only numbers and - and the length should be 10 "];
		}

		$sum = 0;
    	for ($i = 0; $i < 9; $i++) {
    	    $sum += ($value[$i] * (10 - $i));
    	}
    	$remainder = $sum % 11;
    	$check_digit = $remainder < 2 ? $remainder : 11 - $remainder;
		return (!($check_digit == $value[9]))?[false,'message'=>'Invalid national id format']:[True,'is-valid'];
	}
	
	public function wpUsername($value,$name,$options=[]){
		$patern = (isset($options['is_child']) && $options['is_child'])?"/^[a-z][a-z0-9_]+\@[a-z][a-z0-9_]+$/":"/^[a-z][a-zA-Z0-9]+$/";
		$paternCheck = $this->string($value,$name,['min'=>4,'max'=>16,'patern'=>$patern]);
		if(!$paternCheck[0]) return $paternCheck;
		if((!isset($options["unique"]) || $options["unique"]) && username_exists($value)){
			return[False,"message"=>"Username exists"];
		}
		return [True,"message"=>"is-valid"];
	}

	public function wpEmail($value,$name,$options=[]){
		$paternCheck = $this->email($value,$name,$options=[]);
		if(!$paternCheck[0]){
			return $paternCheck;
		}

		if((!isset($options["unique"]) || $options["unique"] == True) && email_exists($value)){
			return[False,"message"=>"email already exists"];
		}
		return [True,"message"=>"is-valid"];
	}

}
