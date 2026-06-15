<?php 
/**
 * @package  AlecadddPlugin
 */
namespace HBVSoft\Pcpc\Inc\Api\Callbacks;

use HBVSoft\Pcpc\Inc\Base\BaseController;
use HBVSoft\Pcpc\Inc\Base\ParentController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

	public function adminCpt()
	{
		return "";//require_once( "$this->plugin_path/templates/cpt.php" );
	}

	public function parentRegister()
	{
		if(isset($_POST) && isset($_POST['action']) && $_POST['action']==="pcpc-plugin-createparent"){
			$parent = new ParentController();
			$parent->parent_register($_POST);
			// print_r($_POST);
		}else{
			return require_once( "$this->plugin_path/templates/ParenrRegisteration.php" );
		}
	}

	public function adminTaxonomy()
	{
		return require_once( "$this->plugin_path/templates/taxonomy.php" );
	}

	public function adminWidget()
	{
		return require_once( "$this->plugin_path/templates/widget.php" );
	}

	public function pcpcAdminSection()
	{
		echo 'Update Customer configs!';
	}

	public function alecadddTextExample()
	{
		$value = esc_attr( get_option( 'text_example' ) );
		echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">';
	}

	public function alecadddFirstName()
	{
		$value = esc_attr( get_option( 'first_name' ) );
		echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your First Name">';
	}
}