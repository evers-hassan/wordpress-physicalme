<h1><?= esc_html($child->display_name); ?></h1>
<h3><?= "نام کاربری : ".esc_html($child->user_login); ?></h3>

<form method="post" id="pcpc_child-change-pass">
    <input type="hidden" name="action" value="pcpc_child-change-pass">
    <input name="form_nonce" type="hidden" value="<?=wp_create_nonce('pcpc_plugin_register_nonce')?>" />    
    <input type="hidden" name="child_id" value="<?= $_GET['child_id']?>">

    <p>
        <label for="new_password">پسورد تازه:</label>
        <input type="password" name="new_password" id="new_password" required>
    </p>
    <p>
        <label for="confirm_password">تایید پسورد:</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
    </p>
    <p>
        <input type="submit" value="بروز رسانی">
    </p>
</form>
