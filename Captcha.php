<?php

/**
 * Captcha plugin
 */
class CaptchaPlugin extends MantisPlugin  {
	/**
	 * A method that populates the plugin information and minimum requirements.
	 * @return void
	 */
	function register() {
		$this->name = plugin_lang_get( 'title' );
		$this->description = plugin_lang_get( 'desc' );
		$this->version = '1.1.1';
		$this->requires = array('MantisCore' => '2.3.0-dev',);
		$this->page      = 'config';
		$this->author = 'Cas Nuy';
		$this->contact = 'cas-at-nuy.info';
		$this->url = 'https://github.com/mantisbt-plugins/Captcha';
	}

	function init() {
		plugin_event_hook( 'EVENT_LAYOUT_RESOURCES', 'resources' );
		plugin_event_hook( 'EVENT_AUTH_USER_FLAGS', 'auth_user_flags' );
	}
	
	function config() {
		return array(
			'lifetime'		=> 20,
			'length'		=> 5,
			);
	}
	
	function auth_user_flags( $p_event_name, $p_args ) {
		# Don't access DB if db_is_connected() is false.
		$t_username = $p_args['username'];
		$t_user_id = $p_args['user_id'];
		# If user is unknown, don't handle authentication for it, since this plugin doesn't do
		# auto-provisioning
		if( !$t_user_id ) {
			return null;
		}
		# If anonymous user, don't handle it.
		if( user_is_anonymous( $t_user_id ) ) {
			return null;
		}
		$t_access_level = user_get_access_level( $t_user_id, ALL_PROJECTS );
		# Have administrators use default login flow
		if( $t_access_level >= ADMINISTRATOR ) {
			return null;
		}
		# for everybody else use the custom authentication
		$t_flags = new AuthFlags();
		# Passwords managed externally for all users
		$t_flags->setCanUseStandardLogin( true );
//		$t_flags->setPasswordManagedExternallyMessage( 'Passwords are no more, you cannot change them!' );
		# No one can use standard auth mechanism
		# Override Login page and Logout Redirect
		$t_flags->setCredentialsPage( helper_url_combine( plugin_page( 'login', /* redirect */ true ), 'username=' . $t_username ) );
//		$t_flags->setLogoutRedirectPage( plugin_page( 'logout', /* redirect */ true ) );
		# No long term session for identity provider to be able to kick users out.
		$t_flags->setPermSessionEnabled( false );
		# Enable re-authentication and use more aggressive timeout.
		$t_flags->setReauthenticationEnabled( true );
		$t_flags->setReauthenticationLifetime( 10 );

		return $t_flags;
	}
		
   # Loading needed styles and javascripts
    function resources() {
       if ( is_page_name( 'plugin.php' ) ) {
            return "<script src='" . plugin_file( 'captcha_script.js' ) . "'></script>";
       }
    }
}
