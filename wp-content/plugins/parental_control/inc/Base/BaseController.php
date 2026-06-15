<?php 
/**
 * @package  AlecadddPlugin
 */
namespace HBVSoft\Pcpc\Inc\Base;

use HBVSoft\Pcpc\Inc\Api\Callbacks\ValidationsCallbacks;

class BaseController{
	public $plugin_path;

	public $plugin_url;

	public $plugin;

	public function __construct() {
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/alecaddd-plugin.php';
	}


	public function nonceValidate($post){
		return (isset($post['form_nonce']) && wp_verify_nonce($_POST['form_nonce'],'test-nonce'));
	}

	protected function getCallback($validation){
		$validationParams=[];
		$validationMethod=Null;
		$validationClass=Null;

		if(is_array($validation)){
			if(count($validation) > 1){
				$validationParams=array_slice($validation, 1);
			}
			$validationMethod=$validation[0];
		}elseif(is_string($validation)){
			$validationMethod=$validation;
		}else{
			trigger_error("Validation method defination error", E_USER_ERROR);
			return false;
		}

		if(is_string($validationMethod)){
			$validationClass = new ValidationsCallbacks();
		}elseif(is_array($validationMethod)){
			if(!class_exists($validationMethod[0])){
				trigger_error("Validation Class is not exists", E_USER_ERROR);
				return False;
			}
			$validationClass = new $validationMethod[0]();
			$validationMethod=$validationMethod[1];
		}
		if(!method_exists($validationClass,$validationMethod)){
			trigger_error("Validation method $validationMethod not exists in class ".get_class($validationClass), E_USER_ERROR);
			return false;
		}
		
		return [[$validationClass ,$validationMethod],$validationParams];
	}

	public function formValidate($post){
		if(method_exists($this,'validationRules')){
			$rules = call_user_func([$this,'validationRules']);
			foreach($rules as $field=>$validation){
				if(!isset($post[$field])) continue;
				$callback = $this->getCallback($validation);
				if(!$callback) return [false,'message'=>'Callback validation not found'];
				$result = call_user_func($callback[0],$post[$field],$field,$callback[1]);
				if(!$result[0]) return $result;
			}
		}
		return [True,"message"=>"form is valid"];
	}


	protected function addCustomPage($page){
		if (empty($page['title']) || empty($page['short_code'])) {
			return false; // Early return if values are not set
		}
		$post_data = [
			'post_title' => $page['title'],
			'post_content' => "[".$page['short_code']."]",
			'post_status' => 'publish',
			'post_type' => 'page',
			'post_name' => $page['short_code']
		];
		if (!empty($post_data) && !get_page_by_path($post_data['post_name'])) {
			return wp_insert_post($post_data);
		}
		return False;
	}
	
}