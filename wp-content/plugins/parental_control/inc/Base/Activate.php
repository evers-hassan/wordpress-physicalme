<?php
/**
 * @package  AlecadddPlugin
 */
namespace HBVSoft\Pcpc\Inc\Base;

class Activate{
	public static function activate() {
		flush_rewrite_rules();
		\HBVSoft\Pcpc\Inc\Base\CustomPostTypeController::createPluginPages();
		// $this->setDefaultValues();
	}
	
}