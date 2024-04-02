<?php
# Copyright (c) MantisBT Team - mantisbt-dev@lists.sourceforge.net
# Licensed under the MIT license

require_once( 'core.php' );
require_api( 'authentication_api.php' );
require_api( 'user_api.php' );

// require_once 'plugins/Captcha2/pages/captcha_verify.php'; 
include "plugins/Captcha/files/captcha_script.js";

$f_username = gpc_get( 'username' );
$f_reauthenticate = gpc_get_bool( 'reauthenticate', false );
$f_return = gpc_get_string( 'return', config_get( 'default_home_page' ) );

$t_return = string_url( string_sanitize_url( $f_return ) );

# Login page shouldn't be indexed by search engines
html_robots_noindex();

layout_login_page_begin();

# TODO: use custom authentication method here.
if(isset($_POST)&& isset($_POST['submit'])){

    //call the function by binding it to a variable
    $verify_captcha = json_decode(verifyCaptcha($_POST['captcha']), true); 
	$result = $verify_captcha['captcha_status'];
	//$result = 200 ;
		if ($result == 200) {
			$t_redirect_url = 'login_captcha_page.php?username='.$f_username;
			print_header_redirect( $t_redirect_url );
		} else {
			$t_redirect_url = 'login_page.php?error=1&return=index.php';
			print_header_redirect( $t_redirect_url );
		}

}
?>
<div class="col-md-offset-3 col-md-6 col-sm-10 col-sm-offset-1">
<div class="login-container">
<div class="space-12 hidden-480"></div>
<?php layout_login_page_logo() ?>
<div class="space-24 hidden-480"></div>
<div class="position-relative">
<div class="signup-box visible widget-box no-border" id="login-box">
<div class="widget-body">
<div class="widget-main">
				<h4 class="header lighter bigger">
					<?php print_icon( 'fa-sign-in', 'ace-icon' ); ?>
					<?php echo "Captcha verification for: " . $f_username;  ?>
				</h4>
<div class="space-10"></div>
<body onload="countDown()">
<form id="login-form" method="post" >
<fieldset>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<div class="captcha-container">
	<?php
	$t_length = config_get( 'plugin_Captcha_length' );
	$srclink = "plugins/Captcha/pages/captcha_image.php?length=";
	$srclink .= $t_length;
	?>
	<div class="captcha">
		<img id="captcha_img" src="<?php echo $srclink ?>" > <button title="Click to refresh image" id="btn_captcha_refresh" type="button">&#8635;</button><label id="captcha_form_label">Enter Text</label>
        <input id="captcha_inp" name="captcha"> 
		<input type="hidden" id="username" name="username" value="<?php echo $f_username ?>" />		
		<div id="cntdwn"></div> 
    </div>
</div>
<div>
<input type="submit" name="submit" class="width-40 pull-right btn btn-success btn-inverse bigger-110" value="<?php echo lang_get( 'login' ) ?>" />
<div> 
 </fieldset>
</form>
</div>
</div>
</div>
</div>
</div>
<?php
layout_login_page_end();

function verifyCaptcha($input = "abc") {
    /**
     * verifyCaptcha : This function verifies the validity of Captcha Images
     * @input : The user input
     * @return : 407 (captcha expired), 200 (captcha verified), 400 (captcha unverified), 500 (Server Error)
     **/

  $date = time();
    if($_SESSION['captcha_set'] &&
        isset($_SESSION['captcha_token']) &&
            isset($_SESSION['captcha_expire'])) {
                //assign values
                $captcha_expire = $_SESSION['captcha_expire'] ;
                $captcha_token = $_SESSION['captcha_token'];
                //check if captcha has expired
               if($date < $_SESSION['captcha_expire']){
					if(md5($input.$captcha_expire) == $captcha_token){
                        unset( $_SESSION['captcha_expire'] );
                        unset( $_SESSION['captcha_token']);
                        unset($_SESSION['captcha_set']);
                        $return = array(
                            "captcha_status" => 200,
                            "captcha_message" => "Captcha Verified!",
                        );
                        return json_encode($return); 
                    } else {
                        $return = array(
                            "captcha_status" => 400,
                            "captcha_message" => "Captcha Verification Failed!",
                         );
                         return json_encode($return);
                    }

                }else{
                    $return = array(
                    "captcha_status" => 407,
                    "captcha_message" => "Captcha Expired!",
                    );
                    return json_encode($return);

            }
          }else{
                $return = array(
                "captcha_status" => 500,
                "captcha_message" => "Session Invalid!",
                 );
                return json_encode($return);
            }
}