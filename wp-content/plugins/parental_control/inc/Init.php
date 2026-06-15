<?php
/**
 * @package  AlecadddPlugin
 */
namespace HBVSoft\Pcpc\Inc;

final class Init
{
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
	public static function get_services()
	{
		return [
			Base\Enqueue::class,
			Base\SettingsLinks::class,
			Base\CustomPostTypeController::class,
			Base\TaxonomyController::class,
			Base\SettingsController::class,
			Base\PermissionController::class,
			Base\ContentFilter::class,
			Base\ParentController::class,
			Base\ChildController::class,
			Base\AdminDashboard::class,
			// Base\ParentRegistration::class,
		];
	}

	/**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it exists
	 * @return
	 */
	public static function register_services() {
		ob_start();
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
		$content = ob_get_clean();
		echo $content;	
		add_filter('admin_url'  , [__CLASS__, 'pcpc_user_login_redirect'], 10, 2 );
		add_filter('the_content', [__CLASS__, 'pcpc_filter_content'],10,2);
		add_filter('login_redirect', [__CLASS__, 'pcpc_login_redirect'], 10, 3);
		add_filter('authenticate', [__CLASS__, 'check_user_status'], 30, 3);
	}

	public static function pcpc_login_redirect($redirect_to, $request, $user) {
        // Check if user is set
        if (isset($user->roles) && is_array($user->roles)) {
            // Redirect based on user role
            if (in_array('pcpc_parent', $user->roles)) {
                return home_url('/pcpc_parent_profile/');
            } elseif (in_array('pcpc_child', $user->roles)) {
                return home_url();
            }
        }

        // Default redirect
        return $redirect_to;
    }

	/**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
	private static function instantiate( $class )
	{
		$service = new $class();

		return $service;
	}


	public static function create_user_roles() {
    
        add_role('pcpc_parent', 'Parent', array(
            // Capabilities for parents
            'read' => true, // Basic read access
            // Add other necessary capabilities here
        ));
    
        add_role('pcpc_child', 'Child', array(
            // Capabilities for children
            'read' => true, // Basic read access
            // Add other necessary capabilities here
        ));
    }

	public static function pcpc_user_login_redirect( $location, $user_id ) {
		if ( is_user_logged_in() ) {
        	$user = get_userdata( $user_id );
			// var_dump([$user,"location"=>$location,"user_id"=>$user_id]);
			if(is_bool($user)){
				return $location;
			}

			$parent_redirect = get_option('pcpc_parent_login_redirect', '/pcpc_parent_profile');
            $child_redirect = get_option('pcpc_child_login_redirect', '/');

			// Redirect based on user role
            if (in_array('pcpc_parent', $user->roles)) {
                return site_url($parent_redirect);
            } elseif (in_array('pcpc_child', $user->roles)) {
                return site_url($child_redirect);
            }

        	// if ( in_array( 'pcpc_parent', $user->roles ) || in_array( 'pcpc_child', $user->roles ) ) {
        	//     return home_url();
        	// }
		}
        return $location;
    }


	static function pcpc_user_can_view_content($content_id, $user_id) {
		$content_tags = wp_get_post_tags($content_id, array('fields' => 'ids'));
		if(count($content_tags) == 0){
			return True;
		}
		// Check if user is logged in
		if (!is_user_logged_in()) {
			return false;
		}
	
		// Get user data
		$user = get_userdata($user_id);
	
		// Check if the user is a parent
		if (user_can($user, 'pcpc_parent') || user_can($user, 'administrator')) {
			return true;
		}

	
		// Check if the user is a child
		if (user_can($user, 'pcpc_child')) {
			$user_permissions = get_user_meta($user_id, 'child_permissions_tags', true);
			$user_limits = get_user_meta($user_id, 'child_limit_tags', true);
	
			// Get the tags associated with the content
			
	
			// if (in_array(get_term_by('name', 'public', 'post_tag')->term_id, $content_tags)) {
			// 	return true;
			// }

			if(in_array('public',$content_tags)){
				return True;
			}
			// Check if the content tags are within the user's permissions and not in limits
			foreach ($content_tags as $tag_id) {
				if (in_array($tag_id, $user_limits)) {
					return false;
				}
				if (in_array($tag_id, $user_permissions)) {
					return true;
				}
			}
		}
	
		return false;
	}
	
	static function pcpc_filter_content($content) {
		global $post;
	
		$excluded_pages_slugs = array(
        'register-parent', // Example: Registration page slug
        // Add other page slugs as needed
        );
		$current_slug = get_post_field('post_name', $post->ID);

		    // Check if the current post slug is in the excluded list
        if (in_array($current_slug, $excluded_pages_slugs)) {
            return $content;
        }

		$public_tag = get_term_by('name', 'public', 'post_tag');
		$public_tag_id = $public_tag ? $public_tag->term_id : null;
	
		// Get the tags associated with the content
		$content_tags = wp_get_post_tags($post->ID, array('fields' => 'ids'));
	
		// Check if the content has the 'public' tag
		if ($public_tag_id && in_array($public_tag_id, $content_tags)) {
			return $content;
		}


		// Check if the user can view this content
		if (!self::pcpc_user_can_view_content($post->ID, get_current_user_id())) {
			return '<p>You do not have permission to view this content.</p>';
		}
	
		return $content;
	}

	public static function check_user_status($user, $username, $password) {
        if (!is_wp_error($user)) {
            $user_id = $user->ID;
            $status = get_user_meta($user_id, 'user_status', true);
            if ($status == 0) {
                return new \WP_Error('inactive_account', __('Your account has been deactivated.'));
            }
        }
        return $user;
    }
}