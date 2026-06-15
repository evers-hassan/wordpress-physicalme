<?php

namespace HBVSoft\Pcpc\Inc;

class I18n {
    const TEXT_DOMAIN = 'parental-customer-plugin';

    public static function text( $text ) {
        return __( $text, self::TEXT_DOMAIN );
    }

    public static function e( $text ) {
        _e( $text, self::TEXT_DOMAIN );
    }

    public static function ngettext( $single, $plural, $count ) {
        return _n( $single, $plural, $count, self::TEXT_DOMAIN );
    }

    public static function sprintf_i18n( $format, ...$args ) {
        return sprintf( __( $format, self::TEXT_DOMAIN ), ...$args );
    }

    // Specific translations for common UI strings
    public static function labels() {
        return [
            'plugin_name' => __( 'Parental Control', self::TEXT_DOMAIN ),
            'parent_profile' => __( 'Parent Profile', self::TEXT_DOMAIN ),
            'child_profile' => __( 'Child Profile', self::TEXT_DOMAIN ),
            'register_parent' => __( 'Register Parent', self::TEXT_DOMAIN ),
            'register_child' => __( 'Register Child', self::TEXT_DOMAIN ),
            'settings' => __( 'Parental Control Settings', self::TEXT_DOMAIN ),
            'username' => __( 'Username', self::TEXT_DOMAIN ),
            'email' => __( 'Email', self::TEXT_DOMAIN ),
            'password' => __( 'Password', self::TEXT_DOMAIN ),
            'first_name' => __( 'First Name', self::TEXT_DOMAIN ),
            'last_name' => __( 'Last Name', self::TEXT_DOMAIN ),
            'mobile' => __( 'Mobile', self::TEXT_DOMAIN ),
            'children' => __( 'Children', self::TEXT_DOMAIN ),
            'max_children' => __( 'Maximum Children per Parent', self::TEXT_DOMAIN ),
            'permissions' => __( 'Permissions', self::TEXT_DOMAIN ),
            'access' => __( 'Access', self::TEXT_DOMAIN ),
            'save' => __( 'Save Changes', self::TEXT_DOMAIN ),
            'delete' => __( 'Delete', self::TEXT_DOMAIN ),
            'edit' => __( 'Edit', self::TEXT_DOMAIN ),
            'add' => __( 'Add', self::TEXT_DOMAIN ),
            'change_password' => __( 'Change Password', self::TEXT_DOMAIN ),
            'status' => __( 'Status', self::TEXT_DOMAIN ),
            'active' => __( 'Active', self::TEXT_DOMAIN ),
            'inactive' => __( 'Inactive', self::TEXT_DOMAIN ),
            'age_groups' => __( 'Age Groups', self::TEXT_DOMAIN ),
            'genres' => __( 'Genres', self::TEXT_DOMAIN ),
            'content_warnings' => __( 'Content Warnings', self::TEXT_DOMAIN ),
            'manage_tags' => __( 'Manage Tags', self::TEXT_DOMAIN ),
        ];
    }

    public static function messages() {
        return [
            'user_created' => __( 'User created successfully', self::TEXT_DOMAIN ),
            'user_updated' => __( 'User updated successfully', self::TEXT_DOMAIN ),
            'user_deleted' => __( 'User deleted successfully', self::TEXT_DOMAIN ),
            'error_saving' => __( 'Error saving user', self::TEXT_DOMAIN ),
            'error_loading' => __( 'Error loading data', self::TEXT_DOMAIN ),
            'error_invalid_request' => __( 'Invalid request', self::TEXT_DOMAIN ),
            'error_unauthorized' => __( 'You are not authorized to perform this action', self::TEXT_DOMAIN ),
            'confirm_delete' => __( 'Are you sure you want to delete this item? This cannot be undone.', self::TEXT_DOMAIN ),
            'confirm_change_status' => __( 'Are you sure you want to change the status?', self::TEXT_DOMAIN ),
        ];
    }
}
