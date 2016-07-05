	<tr>
		<th scope="row"><label for="membership_level"><?php echo  SwpmUtils::_('Membership Level'); ?></label></th>
		<td><select class="regular-text" name="membership_level" id="membership_level">
            <?php foreach ($levels as $level):?>
            <option <?php echo ($level['id'] == $membership_level)? "selected='selected'": "";?> value="<?php echo $level['id'];?>"> <?php echo $level['alias']?></option>
            <?php endforeach;?>
			</select>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="subscription_starts"><?php echo  SwpmUtils::_('Access Starts') ?> </label></th>
		<td><input class="regular-text" name="subscription_starts" type="text" id="subscription_starts" value="<?php echo esc_attr($subscription_starts); ?>" /></td>
	</tr>  
        <tr>
		<th scope="row"><label for="first_name"><?php echo  SwpmUtils::_('First Name') ?> </label></th>
		<td><input class="regular-text" name="first_name" type="text" id="first_name" value="<?php echo esc_attr($first_name); ?>" /></td>
	</tr>
	<tr>
		<th scope="row"><label for="last_name"><?php echo  SwpmUtils::_('Last Name') ?> </label></th>
		<td><input class="regular-text" name="last_name" type="text" id="last_name" value="<?php echo esc_attr($last_name); ?>" /></td>
	</tr>
	<tr>
		<th scope="row"><label for="gender"><?php echo  SwpmUtils::_('Gender'); ?></label></th>
		<td><select class="regular-text" name="gender" id="gender">
				<?php echo  SwpmUtils::gender_dropdown($gender) ?>
			</select>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="phone">Birth Year </label></th>
		<td><input class="regular-text" name="phone" type="text" id="phone" value="<?php echo esc_attr($phone); ?>" /></td>
	</tr>
	<tr>
		<th scope="row"><label for="address_street">Ailment 1 </label></th>
		<td><input class="regular-text" name="address_street" type="text" id="address_street" value="<?php echo esc_attr($address_street); ?>" /></td>
	</tr>
	<tr>
		<th scope="row"><label for="address_city">Ailment 2 </label></th>
		<td><input class="regular-text" name="address_city" type="text" id="address_city" value="<?php echo esc_attr($address_city); ?>" /></td>
	</tr>
	<tr>
		<th scope="row"><label for="address_state">Ailment 3 </label></th>
		<td><input class="regular-text" name="address_state" type="text" id="address_state" value="<?php echo esc_attr($address_state); ?>" /></td>
	</tr>
	<tr>
		<th scope="row"><label for="address_zipcode">Ailment 4 </label></th>
		<td><input class="regular-text" name="address_zipcode" type="text" id="address_zipcode" value="<?php echo esc_attr($address_zipcode); ?>" /></td>
	</tr>
	<tr>
		<th scope="row"><label for="company_name">Ailment 5</label></th>
		<td><input name="company_name" type="text" id="company_name" class="code regular-text" value="<?php echo esc_attr($company_name); ?>" /></td>
	</tr>   
	<tr>
		<th scope="row"><label for="country">Territory </label></th>
		<td><input class="regular-text" name="country" type="text" id="country" value="<?php echo esc_attr($country); ?>" /></td>
	</tr>
	<tr>
		<th scope="row"><label for="member_since"><?php echo  SwpmUtils::_('Member Since') ?> </label></th>
		<td><input class="regular-text" name="member_since" type="text" id="member_since" value="<?php echo esc_attr($member_since); ?>" /></td>
	</tr>
