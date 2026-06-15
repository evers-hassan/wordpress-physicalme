<!--<h1>Parental Registration</h1>-->

<p id="errors"></p>
<form method="post" id="pcpc_parent_register_form" >
    <input name="action" type="hidden" value="pcpc_register_parent">
    <input name="form_nonce" type="hidden" value="<?=wp_create_nonce('pcpc_plugin_register_nonce')?>" />    
    <div class="form-field form-required">
        <div scope="row">
            <label for="user_login">نام کاربری <span class="description">*</span></label>
        </div>
        <div>
            <input name="parent_username" type="text" id="user_login" value="" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="60">
        </div>
    </div>


    <div class="form-field form-required">
        <div scope="row"><label for="email">ایمیل <span class="description">*</span></label></div>
        <div><input name="email" type="email" id="email" value=""></div>
    </div>
    <div class="form-field">
        <div scope="row"><label for="first_name">نام </label></div>
        <div><input name="first_name" type="text" id="first_name" value=""></div>
    </div>
    <div class="form-field">
        <div scope="row"><label for="last_name">نام خانوادگی </label></div>
        <div><input name="last_name" type="text" id="last_name" value=""></div>
    </div>
    <div class="form-field">
        <div scope="row"><label for="mobile">موبایل <span class="description">*</span> </label></div>
        <div><input name="mobile" type="text" id="mobile" class="code" value=""></div>
    </div>
    <div class="form-field form-required user-pass1-wrap">
        <div scope="row">
            <label for="pass1">
                پسورد <span class="description">*</span>
            </label>
        </div>
        <div class="password-input-wrapper">
            <input type="password" name="password" id="pass1" class="regular-text strong" autocomplete="new-password" spellcheck="false" data-reveal="1" data-pw="FMpb0qW8kUkI6kzd^oLnG%k4" aria-describedby="pass-strength-result">    
        </div>
    </div>
    <div class="form-field form-required user-pass2-wrap hide-if-js" style="">
        <div scope="row">
            <label for="pass2">تکرار پسورد <span class="description">*</span></label>
        </div>
        <div>
            <input type="password" name="pass2" id="pass2" autocomplete="new-password" spellcheck="false" aria-describedby="pass2-desc">
        </div>
    </div>
    
    <p class="submit"><input type="submit" name="createuser" id="createusersub" class="button button-primary" value="ثبت نام"></p>
</form>