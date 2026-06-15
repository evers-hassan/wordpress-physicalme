<?php

namespace HBVSoft\Pcpc\Inc\Base;
use HBVSoft\Pcpc\Inc\Base\BaseController;


class ParentController extends BaseController
{
    public function validationRules(){
        return [
            'username'=>['wpUsername',"unique"=>True],
            'email' => ['wpEmail',"unique"=>True],
            'password'=>['string','min'=>8,'max'=>16],
            'first_name'=>['string','max'=>32,'patern'=>'/^[\p{L}\p{N}\s]+$/u'],//'patern'=>"/^[a-zA-Z]+$/"],
            'last_name' =>['string','max'=>32,'patern'=>'/^[\p{L}\p{N}\s]+$/u'],//'patern'=>"/^[a-zA-Z]+$/"],
            'mobile'=>['mobile','unique'=>True],
            'national_id'=>['national_id']
        ];
    }

    public function register()
    {
        // Register the shortcode for the registration form
        add_shortcode('pcpc_register_parent', [$this, 'registration_form']);
        // $this->addCustomPage(["short_code"=>'pcpc_register_parent',"title"=>"Register Parent"]);

        // Parent profile short key
        add_shortcode('pcpc_parent_profile', [$this,'profile']);
        // $this->addCustomPage(["short_code"=>'pcpc_parent_profile',"title"=>"pcpc_parent_profile"]);

        add_action('wp_ajax_pcpc_register_parent', [$this, 'register_parent']);
        add_action('wp_ajax_nopriv_pcpc_register_parent', [$this, 'register_parent']);


    }

    public function registration_form() {
        ob_start();
        wp_enqueue_script( 'pcpc_parent_register_script', $this->plugin_url . 'assets/parent_form.js' , array('jquery'), '1.0', true);
        wp_localize_script( 'pcpc_parent_register_script', 'my_ajax_object', [ 'ajax_url' => admin_url( 'admin-ajax.php' ) ,'login_url'=>wp_login_url()] );

        wp_register_style('form-css', $this->plugin_url.'assets/form.css');
        wp_enqueue_style('form-css');

        // Register the AJAX action for handling form submission


        require_once( "$this->plugin_path/templates/parent-registeration.php" );
        // You can use existing validation class and form generation logic
        return ob_get_clean();
    }

    public function register_parent() {
        ob_start();

        check_ajax_referer('pcpc_plugin_register_nonce', 'form_nonce');

        $result = $this->formValidate($_POST);
        if(!$result[0]){
            wp_send_json_error($result['message']); 
            wp_die();    
        }
        $user_id = wp_insert_user(array(
            'user_login' => sanitize_text_field($_POST['parent_username']),//$username,
            'user_pass' => $_POST['password'],
            'user_nicename'=> sanitize_text_field($_POST['first_name']),
            'user_email'=> sanitize_email($_POST['email']),
            'user_status' =>'active',
            'display_name' => sanitize_text_field($_POST['first_name']),
            'role' =>'pcpc_parent',
        ));

        if(is_wp_error($user_id)){
            wp_send_json_error('User save problem'); 
            wp_die(); 
        }else{
            update_user_meta($user_id, 'mobile', sanitize_text_field($_POST['mobile']));
            update_user_meta($user_id, 'first_name', sanitize_text_field($_POST['first_name']));
            update_user_meta($user_id, 'last_name', sanitize_text_field($_POST['last_name']));
            update_user_meta($user_id, 'levet', 1);
            update_user_meta($user_id, 'user_status', 1);
        }

        wp_send_json_success('User created successfully');
        wp_die();

        // ... validation logic using your validation class
        // ... user creation logic using wp_insert_user



        // ... provide success or error messages

        return ob_get_clean();
    }

    public function profile(){
        ob_start();
        if (!is_user_logged_in() || !current_user_can('pcpc_parent')) {
            wp_redirect(home_url());
            exit;
        }

        $current_user = wp_get_current_user();
        $user_data = get_userdata($current_user->ID);
        $children = get_users(array(
            'meta_key' => 'parent_id',
            'meta_value' => $current_user->ID
        ));
        $max_children = get_option('pcpc_max_children', 3); // Default to 3 if option not set
        $child_count = count($children);

        wp_register_style('parent_profile-css', $this->plugin_url.'assets/parent_profile.css');
        wp_enqueue_style('parent_profile-css');
        
        wp_register_style('fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');
        wp_enqueue_style('fontawesome-css');
         
        wp_enqueue_script('pcpc_parent_profile_script', $this->plugin_url . 'assets/parent_profile.js', array('jquery'), '1.0', true);
        wp_localize_script( 'pcpc_parent_profile_script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ,'parent_profile'=>'/pcpc_parent_profile/', 'form_nonce' => wp_create_nonce('pcpc_plugin_register_nonce')) );

        require_once( "$this->plugin_path/templates/parent-profile.php" );

        return ob_get_clean();
    }
}
