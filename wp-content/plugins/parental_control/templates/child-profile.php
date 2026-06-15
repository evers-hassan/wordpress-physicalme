<div class="pcpc-child-profile">
    <h2><?php _e('Child Profile', 'parental-customer-plugin'); ?></h2>
    <p><strong><?php _e('Name:', 'parental-customer-plugin'); ?></strong> <?php echo esc_html($child_data->display_name); ?></p>
    <p><strong><?php _e('Username:', 'parental-customer-plugin'); ?></strong> <?php echo esc_html($child_data->user_login); ?></p>

    <input type="hidden" name="form_nonce" value="<?php echo esc_attr(wp_create_nonce('pcpc_plugin_register_nonce')); ?>" />
    <input type="hidden" name="child_id" value="<?php echo intval(sanitize_text_field($_GET['child_id'])); ?>" />

    <?php echo HBVSoft\Pcpc\Inc\Base\PermissionController::render_child_permission_ui($child_id); ?>
</div>