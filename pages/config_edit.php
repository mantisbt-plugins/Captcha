<?php
// authenticate
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
// Read results
$f_lifetime			= gpc_get_int( 'lifetime' );
$f_length			= gpc_get_int( 'length' );
// update results
plugin_config_set( 'lifetime', $f_lifetime );
plugin_config_set( 'length', $f_length );
// redirect
print_header_redirect( "manage_plugin_page.php" );