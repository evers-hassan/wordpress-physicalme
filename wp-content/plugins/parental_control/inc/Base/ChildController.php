<?php
namespace HBVSoft\Pcpc\Inc\Base;

use HBVSoft\Pcpc\Inc\Base\BaseController;

class ChildController extends BaseController{
    public function validationRules(){
        return [
            'child_username'=>['wpUsername',"unique"=>True,"is_child"=>True],
            'password'=>['string','min'=>8,'max'=>16],
            'first_name'=>['string','max'=>32,'patern'=>'/^[\p{L}\p{N}\s]+$/u'],//'patern'=>"/^[a-zA-Z]+$/"],
            'last_name' =>['string','max'=>32,'patern'=>'/^[\p{L}\p{N}\s]+$/u'],//'patern'=>"/^[a-zA-Z]+$/"],
        ];
    }

    public function register(){
        // Register the shortcode for the child registration form
        add_shortcode('pcpc_register_child', [$this, 'registration_form']);
        // $this->addCustomPage(["short_code"=>'pcpc_register_child',"title"=>"Register Child"]);
        add_shortcode('pcpc_child_profile', [$this, 'profile']);
        // $this->addCustomPage(["short_code"=>'pcpc_child_profile',"title"=>"Child Profile"]);
        add_shortcode('pcpc_child_change_password', [$this, 'change_password']);
        // $this->addCustomPage(["short_code"=>'pcpc_child_change_password',"title"=>"Child Change Password"]);

        // Register the AJAX action for handling child registration
        add_action('wp_ajax_pcpc_register_child', [$this, 'register_child']);
        add_action('wp_ajax_nopriv_pcpc_register_child', [$this, 'register_child']);

        add_action('wp_ajax_pcpc_child_permisions', [$this, 'permisions']);
        add_action('wp_ajax_nopriv_pcpc_child_permisions', [$this, 'permisions']);

        add_action('wp_ajax_pcpc_child-change-pass', [$this, 'update_password']);
        add_action('wp_ajax_nopriv_pcpc_child-change-pass', [$this, 'update_password']);
   
        add_action('wp_ajax_pcpc_delete_child', [$this,'delete_child']);
        add_action('wp_ajax_nopriv_pcpc_delete_child', [$this, 'delete_child']);

        add_action('wp_ajax_pcpc_change_child_status', [$this,'change_status']);
        add_action('wp_ajax_nopriv_pcpc_change_child_status', [$this, 'change_status']);

        
    }

    public function registration_form(){
        ob_start();
        // Check if the user is logged in and has the 'parent' role
        if (!is_user_logged_in() || !current_user_can('pcpc_parent')) {
            wp_die('You must be logged in as a parent to access this page.');
        }

        // Check if the parent has reached the maximum number of children
        $parent_id = get_current_user_id();
        $child_count = count(get_users(array('meta_key' => 'parent_id', 'meta_value' => $parent_id)));
        $max_children = get_option('pcpc_max_children', 3); // Default to 3 if option not set
        if ($child_count >= $max_children) {
            // Handle maximum children reached
            wp_die('You have reached the maximum number of children allowed.');
        }
        $current_user = wp_get_current_user();
        $username = $current_user->user_login;
        // Display the child registration form
        wp_register_style('form-css', $this->plugin_url.'assets/form.css');
        wp_enqueue_style('form-css');
        
        
        wp_enqueue_script( 'pcpc_child_register_script', $this->plugin_url . 'assets/child_form.js' , array('jquery'), '1.0', true);
        wp_localize_script( 'pcpc_child_register_script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ,'parent_profile'=>'/pcpc_parent_profile/') );

        require_once($this->plugin_path . '/templates/child-registeration.php');
        return ob_get_clean();
    }

    public function register_child(){
        check_ajax_referer('pcpc_plugin_register_nonce', 'form_nonce');

        $current_user = wp_get_current_user();
        $username = $current_user->user_login;
        $_POST['child_username'] = sanitize_text_field($_POST['child_username']) . "@{$username}";
        $result = $this->formValidate($_POST);
        if(!$result[0]){
            wp_send_json_error($result['message']); 
            wp_die();    
        }

        $user_id = wp_insert_user(array(
            'user_login' => $_POST['child_username'],//$username,
            'user_pass' => $_POST['password'],
            'user_nicename'=> sanitize_text_field($_POST['first_name']),
            'user_status' =>'active',
            'display_name' => sanitize_text_field($_POST['first_name']),
            'role' =>'pcpc_child',
        ));

        if(is_wp_error($user_id)){
            wp_send_json_error('child save problem'); 
            wp_die(); 
        }else{
            update_user_meta($user_id, 'parent_id', get_current_user_id());
            update_user_meta($user_id, 'first_name', sanitize_text_field($_POST['first_name']));
            update_user_meta($user_id, 'last_name', sanitize_text_field($_POST['last_name']));
            update_user_meta($user_id, 'age_levet', 1);
            update_user_meta($user_id, 'user_status', 1);

            wp_send_json_success('child saved');
            wp_die();
        }
        wp_die(); 
    }

    public function profile(){
        ob_start();
        if (!is_user_logged_in() || !current_user_can('pcpc_parent')) {
            wp_redirect(home_url());
            exit;
        }

        wp_enqueue_script( 'pcpc_child_permision_script', $this->plugin_url . 'assets/child_permisions.js' , array('jquery'), '1.0', true);
        wp_localize_script('pcpc_child_permision_script', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php'),'parent_profile'=>'/pcpc_parent_profile/', 'form_nonce' => wp_create_nonce('pcpc_plugin_register_nonce')));
        wp_enqueue_style('select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');
        wp_enqueue_script('select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery'), null, true);
        
        // wp_localize_script('pcpc_child_permision_script', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php' ) ,'login_url'=>wp_login_url()) );
        $child_id = intval(sanitize_text_field($_GET['child_id']));


        $current_user = wp_get_current_user();
        $user_data = get_userdata($current_user->ID);
        $child_data= get_userdata($child_id);
        $child_meta_data =get_user_meta($child_id);

        if(intval($child_meta_data["parent_id"][0]) != $current_user->ID){
            wp_redirect(home_url());
            wp_die(); 
        }

        $child_permissions = get_user_meta($child_id, 'child_permissions_tags', true);
        $child_limits = get_user_meta($child_id, 'child_limit_tags', true);

        // Fetch all tags from the site
        $tags = get_tags();

        require_once($this->plugin_path . '/templates/child-profile.php');
        return ob_get_clean();
        
    }

    function permisions(){
        check_ajax_referer('pcpc_plugin_register_nonce', 'form_nonce');

        if (!is_user_logged_in() || !current_user_can('pcpc_parent')) {
            wp_redirect(home_url());
            exit;
        }

        $parent_id = get_current_user_id();
        $child_id = intval(sanitize_text_field($_POST["child_id"]));
        $child_data= get_userdata($child_id);
        $child_meta_data =get_user_meta($child_id);
        if(intval($child_meta_data["parent_id"][0]) != $parent_id || !user_can($child_id, 'pcpc_child')){
            wp_send_json_error("Child not found."); 
            wp_die(); 
        }

        $permissions = isset($_POST['child_permissions_tags']) ? array_map('intval', $_POST['child_permissions_tags']) : [];
        $limits = isset($_POST['child_limit_tags']) ? array_map('intval', $_POST['child_limit_tags']) : [];
        $permissions = array_diff($permissions, $limits);

        update_user_meta($child_id, 'child_permissions_tags', $permissions);
        update_user_meta($child_id, 'child_limit_tags', $limits);
    
        wp_send_json_success('Child tags updated successfully.');
        wp_die();
        
    }

    function change_password(){
        if (!is_user_logged_in() || !current_user_can('pcpc_parent')) {
            wp_redirect(home_url());
            exit;
        }

        $parent_id = get_current_user_id();
        $child_id = isset($_GET['child_id']) ? intval(sanitize_text_field($_GET['child_id'])) : 0;

        $child = get_userdata($child_id);
        
        if (!$child) {
            wp_send_json_error("Child not found."); 
            wp_die();            
        }
        
        $child_meta_data =get_user_meta($child_id);

        if(intval($child_meta_data["parent_id"][0]) != $parent_id || !user_can($child_id, 'pcpc_child')){
            wp_send_json_error("Child not found."); 
            wp_die(); 
        }

        ob_start();
        
        wp_enqueue_script( 'pcpc_child_change_password', $this->plugin_url . 'assets/child_change_pass.js' , array('jquery'), '1.0', true);
        wp_localize_script( 'pcpc_child_change_password', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ,'parent_profile'=>'/pcpc_parent_profile/') );

        require_once($this->plugin_path . '/templates/change-child-pass.php');
        return ob_get_clean();

    }


    function update_password(){
        check_ajax_referer('pcpc_plugin_register_nonce', 'form_nonce');

        if (!is_user_logged_in() || !current_user_can('pcpc_parent')) {
            wp_redirect(home_url());
            exit;
        }

        $parent_id = get_current_user_id();
        $child_id = isset($_POST['child_id']) ? intval(sanitize_text_field($_POST['child_id'])) : 0;

        $child = get_userdata($child_id);
        $child_meta_data =get_user_meta($child_id);
        
        if (!$child) {
            wp_send_json_error("Child not found.1"); 
            wp_die();            
        }

        if(intval($child_meta_data["parent_id"][0]) != $parent_id || !user_can($child_id, 'pcpc_child')){
            wp_send_json_error("Child not found.2"); 
            wp_die(); 
        }

        $new_password = sanitize_text_field($_POST['new_password']);
        $confirm_password = sanitize_text_field($_POST['confirm_password']);

        if ($new_password === $confirm_password) {
            wp_set_password($new_password, $child_id);
            wp_send_json_success("Password changed successfully."); 
            wp_die(); 
        } else {
            wp_send_json_error("Passwords do not match."); 
            wp_die();
        }

    }


    function delete_child() {
        check_ajax_referer('pcpc_plugin_register_nonce', 'form_nonce');

        if (!is_user_logged_in() || !current_user_can('pcpc_parent')) {
            wp_die('You must be logged in as a parent to access this page.');
        }

        if (!isset($_POST['child_id'])) {
            wp_send_json_error('Invalid request.');
            return;
        }

        $child_id = intval(sanitize_text_field($_POST['child_id']));

        if (get_userdata($child_id)) {
            // Delete the user
            $deleted = wp_delete_user($child_id);
            
            if ($deleted) {
                wp_send_json_success();
            } else {
                wp_send_json_error('there was an error.');
            }
        } else {
            wp_send_json_error('Userchild not found.');
        }
    }

    function change_status(){
        check_ajax_referer('pcpc_plugin_register_nonce', 'form_nonce');

        if (!is_user_logged_in() || !current_user_can('pcpc_parent')) {
            wp_die('You must be logged in as a parent to access this page.');
        }

        if (!isset($_POST['child_id'])) {
            wp_send_json_error('Invalid request.');
            return;
        }

        $child_id = intval(sanitize_text_field($_POST['child_id']));
        $status = get_user_meta($child_id, 'user_status', true);
        update_user_meta($child_id, 'user_status', (intval($status))?0:1); // 1 for active, 0 for inactive
        wp_send_json_success();
    }
    
}
