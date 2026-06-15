<?php 
/**
 * @package  AlecadddPlugin
 */
namespace HBVSoft\Pcpc\Inc\Api\Callbacks;

use HBVSoft\Pcpc\Inc\Base\BaseController;

class CustomersCallbaks extends BaseController
{
	public function checkboxSanitize( $input )
	{
		//Do any thing before save (validate encript and so on)
		return ( isset($input) ? true : false );
	}

	public function intFieldSanitize( $input ){
		//Do any thing before save (validate encript and so on)
		return $input;
	}

	public function adminSectionManager()
	{
		echo 'Configurat the Plugin.';
	}

	public function checkboxField( $args )
	{
		$name = $args['label_for'];
		$classes = $args['class'];
		$checkbox = get_option( $name );
		echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $name . '" value="1" class="" ' . ($checkbox ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
	}

	public function textField( $args ){
		
		$name = $args['option_name'];
		$id = (isset($args['id']))?$args['id']:"{$name}_id";
		$type = (isset($args['type']))?$args['type']:"text";
		$value =(isset($args['value']))?$args['value']:"";
		$label_for = $id;
		$class = $args['input-class'];
		$classes = $args['class'];
		echo "<div class='$classes'><input type='$type' id='$name' name='$name' value='$value' class='$class'><label for='$label_for'><div></div></label></div>";
	}
}