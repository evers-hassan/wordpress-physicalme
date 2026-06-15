<?php
/**
 * @package  AlecadddPlugin
 */
namespace HBVSoft\Pcpc\Inc\Base;

class Deactivate
{
	public static function deactivate() {
		\HBVSoft\Pcpc\Inc\Base\CustomPostTypeController::removePluginPages();
		flush_rewrite_rules();
	}
}