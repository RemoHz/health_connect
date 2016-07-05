<?php

/* function set_default_group( $user_id ) {

	if ( empty( $user_id ) ) {
		return;
	}
	$accounttype  = xprofile_get_field_data( 'I am a', $user_id );

	if ($accounttype  == 'Student') {
		groups_join_group( 1, $user_id );
	}	
	elseif ($accounttype  == 'Teacher') {
		groups_join_group( 2, $user_id );
	}
	groups_join_group( $group_id, $user_id );
}
add_action( 'bp_core_signup_user', 'set_default_group', 11, 1 );  */


?>