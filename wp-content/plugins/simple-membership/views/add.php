<link rel='stylesheet' type='text/css' href='stylesheet.css'/>
<link rel='stylesheet' type='text/css' href='https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css'/>
<link rel='stylesheet' type='text/css' href='https://health-connect.site/sweetalert.css'/>
<script src="https://health-connect.site/sweetalert.min.js"></script>
<script type='text/javascript' src='script.js'></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
		
<div class="swpm-registration-widget-form">
    <form id="swpm-registration-form" name="swpm-registration-form" method="post" action="">
        <input type ="hidden" name="level_identifier" value="<?php echo $level_identifier ?>" />
        <table>
            <tr class="swpm-registration-username-row">
                <td><label style="color: red; font-size:20px;">*</label><label for="user_name"><?php echo SwpmUtils::_('Username') ?></label></td>
                <td><input type="text" id="user_name" class="validate[required,custom[noapostrophe],custom[SWPMUserName],minSize[4],ajax[ajaxUserCall]]" value="<?php echo $user_name; ?>" size="50" name="user_name" /></td>
            </tr>
            <tr class="swpm-registration-email-row">
                <td><label style="color: red; font-size:20px;">*</label><label for="email"><?php echo SwpmUtils::_('Email') ?></label></td>
                <td><input type="text" id="email" class="validate[required,custom[email],ajax[ajaxEmailCall]]" value="<?php echo $email; ?>" size="50" name="email" /></td>
            </tr>
            <tr class="swpm-registration-password-row">
                <td><label style="color: red; font-size:20px;">*</label><label for="password"><?php echo SwpmUtils::_('Password') ?></label></td>
                <td><input type="password" autocomplete="off" id="password" value="" size="50" name="password" /></td>
            </tr>
            <tr class="swpm-registration-password-retype-row">
                <td><label style="color: red; font-size:20px;">*</label><label for="password_re"><?php echo SwpmUtils::_('Repeat Password') ?></label></td>
                <td><input type="password" autocomplete="off" id="password_re" value="" size="50" name="password_re" /></td>
            </tr>
			
			
			
			<tr>
				<td><label style="color: red; font-size:20px;">*</label><label for="user_name">Ailment</label></td>
				<td>
					<input type="checkbox" id="address_street" name="address_street" value="Alcohol Abuse" />Alcohol Abuse&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
					<input type="checkbox" id="address_city" name="address_city" value="Cancer" />Cancer&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
					<input type="checkbox" id="address_state" name="address_state" value="Diabetes" />Diabetes&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
					<input type="checkbox" id="address_zipcode" name="address_zipcode" value="Drug abuse" />Drug abuse&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
					<input type="checkbox" id="company_name" name="company_name" value="Obesity" />Obesity
				</td>
			</tr>
			
            <tr>
				<td><label style="color: red; font-size:20px;">*</label><label for="user_name">Gender</label></td>
				<td>
					<select id="gender" name="gender" style="width:106px;" class="validate[required]">
						<option disabled selected hidden>-Select-</option>
						<option value="male">male</option>
						<option value="female">female</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td><label style="color: red; font-size:20px;">*</label><label for="user_name">Year of Birth</label></td>
				<td>
					<select id="phone" name="phone" style="width:106px;" class="validate[required]">
						<option disabled selected hidden>-Select-</option>
						<?php
							
							for ($i = 1950; $i <= date("Y")-15; $i++)
							{
								echo '<option value"='.$i.'">'.$i.'</option>';
							}
						?>
					</select>
					
				</td>
			</tr>
			
			<tr>
				<td><label style="color: red; font-size:20px;">*</label><label for="user_name">Territory</label></td>
				<td>
					<select id="country" name="country" style="width:106px;" class="validate[required]">
						<option disabled selected hidden>-Select-</option>
						<option value="Inner City">Inner City</option>
						<option value="Northern">Northern</option>
						<option value="South Eastern">South Eastern</option>
						<option value="Western">Western</option>
					</select>
					
				</td>
			</tr>

			<tr>
				<td colspan="2"><label style="color: red; font-size:20px;">*</label><label for="user_name">The information that you provide us through this form will be kept confidential and will only be used to enhance our website and serve our users better.</label></td>
			</tr>
        </table>        
        
        <div class="swpm-before-registration-submit-section" align="center"><?php echo apply_filters('swpm_before_registration_submit_button', ''); ?></div>
        
        <div class="swpm-registration-submit-section" align="center">
            <input type="submit" id="regist_submit" value="<?php echo SwpmUtils::_('Register') ?>" class="swpm-registration-submit" name="swpm_registration_submit" />
        </div>
        
        <input type="hidden" name="action" value="custom_posts" />
        
    </form>
</div>
<script>
    jQuery(document).ready(function ($) {
        $.validationEngineLanguage.allRules['ajaxUserCall']['url'] = '<?php echo admin_url('admin-ajax.php'); ?>';
        $.validationEngineLanguage.allRules['ajaxEmailCall']['url'] = '<?php echo admin_url('admin-ajax.php'); ?>';
        $.validationEngineLanguage.allRules['ajaxEmailCall']['extraData'] = '&action=swpm_validate_email&member_id=<?php echo filter_input(INPUT_GET, 'member_id'); ?>';
        $("#swpm-registration-form").validationEngine('attach');
		
		//$( "#datepicker" ).datepicker({yearRange: '1950:' + new Date().getFullYear()});
		$('#regist_submit').click(function() {
		  checked = $("input[type=checkbox]:checked").length;

		  if(!checked) {
			//alert("You must check at least one checkbox.");
			//confirm("You must check at least one Aliment.!");
			swal("Please select at least one Aliment!")
			return false;
		  }

		});
    });

</script>
