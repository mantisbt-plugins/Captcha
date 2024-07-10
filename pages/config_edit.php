<?php
// authenticate
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
// Read results
$f_lifetime			= gpc_get_int( 'lifetime' );
$f_length			= gpc_get_int( 'length' );
$f_antibotq			= gpc_get_int( 'antibotq' );
$f_imagetext		= gpc_get_int( 'imagetext' );
if ( ( $f_antibotq == 1 ) and ( $f_imagetext == 1 ) ) {
	plugin_error( CaptchaPlugin::ERROR_BOTH_NOT_ACTIVE );


}
// update results
plugin_config_set( 'lifetime', $f_lifetime );
plugin_config_set( 'length', $f_length );
plugin_config_set( 'antibotq', $f_antibotq );
plugin_config_set( 'imagetext', $f_imagetext );
// redirect
print_header_redirect( "manage_plugin_page.php" );