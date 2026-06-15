<?php
/**
 * @package PCPC
 * 
 */
namespace HBVSoft\Pcpc\Inc\Base;

use HBVSoft\Pcpc\Inc\Base\BaseController;

class CustomPostTypeController extends BaseController{

    public $custom_post_type=[];

    public function register(){
        add_action('init',[$this,'activate']);
    } 

    public function activate(){
        register_post_type('pcpc_age_limit',[
            'labels'=>[
                    'name'=>'Parental Control',
                    'singular_name' => 'parental-control'
                    ],
                'public' => True,
                'has_archive' => False
        ]);
    }

 
    public static function removePluginPages(){
        $pages = ['pcpc_register_parent','pcpc_parent_profile','pcpc_register_child','pcpc_child_profile','pcpc_child_change_password'];
        foreach($pages as $page){
            $page = get_page_by_path($page);
            if($page){
                wp_delete_post($page->ID, true);
            }
        }
    }
    public static function createPluginPages(){
        $pages=[
            [
                "title"=>"Register Parent",
                "content" => "[pcpc_register_parent]",
                "slug" =>"pcpc_register_parent"
            ],
            [
                "title"=>"Parent Profile",
                "content" => "[pcpc_parent_profile]",
                "slug" =>"pcpc_parent_profile"
            ],
            [
                "title"=>"Register Child",
                "content" => "[pcpc_register_child]",
                "slug" =>"pcpc_register_child"
            ],
            [
                "title"=>"Child Profile",
                "content" => "[pcpc_child_profile]",
                "slug" =>"pcpc_child_profile"
            ],
            [
                "title"=>"Child Recover Password",
                "content" => "[pcpc_child_change_password]",
                "slug" =>"pcpc_child_change_password"
            ],
        ];
        foreach ($pages as $page) {
            $post_data = [
                'post_title' => wp_strip_all_tags($page['title']),
                'post_content' => $page['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_name' => $page['slug'],
                'post_author'=>get_current_user_id(),
            ];
            if (!get_page_by_path($page['slug'])) {
                $post_id = wp_insert_post($post_data);
                update_post_meta($post_id, '_pcpc_plugin_page', $page['slug']);
            }
        }
    }
}