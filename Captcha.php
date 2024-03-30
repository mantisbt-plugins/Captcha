<?php
# Captcha - a plugin for MantisBT to show a captcha @ signup & @ login
#

require_once('plugins/Captcha/pages/captcha_verify.php'); 

class CaptchaPlugin extends MantisPlugin {

    # Plugin definition
	function register() {
		$this->name         = lang_get( 'plugin_Captcha_title' );
		$this->description  = lang_get ( 'plugin_Captcha_desc' );
		$this->version      = '1.0.0';
		$this->requires		= array( 'MantisCore' => '2.0.0', );
		$this->author       = 'Cas Nuy';
		$this->url          = 'https://github.com/mantisbt-plugins/Captcha';
		$this->page      = 'config';
	}

	function config() {
		return array(
			'lifetime'		=> 60,
			'length'		=> 5,
			);
	}


	function init() {
		event_declare( 'EVENT_LOGIN_SHOW' );
		event_declare( 'EVENT_LOGIN_HANDLE' );
		plugin_event_hook( 'EVENT_LAYOUT_RESOURCES', 'resources' );
		plugin_event_hook( 'EVENT_LOGIN_SHOW', 'show_captcha' );
		plugin_event_hook( 'EVENT_LOGIN_HANDLE', 'handle_captcha' );
	}

 	# show captcha
	function show_captcha() {
		include 'plugins/Captcha/pages/showcaptcha.php';
	}

	# handle captcha
	function handle_captcha( $p_event, $p_captcha ) {
		//call the function by binding it to a variable
		$verify_captcha = json_decode( verifyCaptcha( $p_captcha ), true ); 

		if ($verify_captcha['captcha_status'] <> 200) {
				$t_redirect_url = 'login_page.php?error=1&return=index.php';
				print_header_redirect( $t_redirect_url );
		}
	}
	
   # Loading needed styles and javascripts
    function resources() {
       if ( is_page_name( 'plugin.php' ) ) {
            return
                "
                    <link rel='stylesheet' type='text/css' href='" . plugin_file( 'captcha_style.css' ) . "'>
					<script src='" . plugin_file( 'captcha_script.js' ) . "'></script>

                ";
       }
    }

}