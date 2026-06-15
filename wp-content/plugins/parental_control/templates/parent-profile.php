<!--<h1>Parent Profile</h1>-->
<p>نام: <?php echo $user_data->display_name; ?></p>
<p>رایانامه: <?php echo $user_data->user_email; ?></p>
<h2>فرزندان</h2>

<div class="custom-container">
    <div class="custom-row header-row">
        <div class="custom-col">نام فرزند</div>
        <div class="custom-col">عملیات</div>
    </div>
    <?php foreach ($children as $child) : ?>
    <div class="custom-row">
        <div class="custom-col">
            <a href="<?= get_option('pcpc_child_profile_url')?>/?child_id=<?= $child->ID ?>"><?= $child->display_name ?></a>
        </div>
        <div class="custom-col">
            <?php if(get_user_meta($child->ID, 'user_status',true)):?>
            <a href="pcpc_change_child_status" data-action="pcpc_change_child_status" class="change-status" title="فعال" data-id="<?= $child->ID ?>" confirm_message="آیا مایل به غیر فعال سازی <?= $child->display_name ?> هستید؟"><i class="fa fa-eye"></i></a>
            <?php else:?>
            <a href="pcpc_change_child_status" data-action="pcpc_change_child_status" class="change-status" title="غیر فعال" data-id="<?= $child->ID ?>" confirm_message="آیا مایل به فعال سازی <?= $child->display_name ?> هستید؟ ."><i class="fa fa-eye-slash"></i></a>
            <?php endif ?>
            <a href="<?= get_option('pcpc_child_change_password_url')?>/?child_id=<?= $child->ID ?>" class="change-password-link" title="تغییر پسورد"><i class="fa fa-key"></i></a>
            <a href="pcpc_delete_child" data-action="pcpc_delete_child" class="delete-button" data-id="<?= $child->ID ?>" title="حذف" confirm_message="آیا مایل به حذف <?= $child->display_name ?> هستید؟ این تغییر قابل برگرداندن نیست."><i class="fa fa-remove"></i></a>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="custom-row">
        <?php if ($child_count < get_option('PCPC_plugin_max_children')) : ?>
        <div class="custom-col"><a href="<?= get_option('pcpc_child_register_url')?>" id="add-child-button" title="افزودن فرزند">افزودن فرزند </a></div>
        <div class="custom-col">
                <a href="<?= get_option('pcpc_child_register_url')?>" id="add-child-button" title="افزودن فرزند"><i class="fa fa-plus"></i></a>
                <div id="child-registration-form"></div>
            </div>
        <?php endif; ?>
    </div>
</div>
