<h3>reCAPTCHA Addon Settings </h3>
<p>Read the <a href="https://simple-membership-plugin.com/simple-membership-and-google-recaptcha-integration/" target="_blank">usage documentation</a> to learn how to use the Google reCAPTCHA addon</p>
<table class="form-table">
    <tbody>
        <tr>
            <th scope="row">Enable Google reCAPTCHA</th>
            <td><input type="checkbox" <?php echo $enable_captcha; ?> name="swpm-addon-enable-captcha"  value="checked='checked'" />
            <p class="description">Enable/disable recaptcha integration</p>
            </td>
        </tr>
        <tr>
            <th scope="row">Google Recaptcha Site Key</th>
            <td>
                <input name="swpm-addon-google-recaptcha-site-key" type="text" size="60" value="<?php echo $google_recaptcha_site_key; ?>"/>
                <p class="description">The site key for the reCAPTCHA API</p>
            </td>
        </tr>
        <tr>
            <th scope="row">Google Recaptcha Secret Key</th>
            <td>
                <input name="swpm-addon-google-recaptcha-secret-key" type="text" size="60" value="<?php echo $google_recaptcha_secret_key; ?>"/>
                <p class="description">The secret key for the reCAPTCHA API</p>
            </td>
        </tr>
    </tbody>
</table>