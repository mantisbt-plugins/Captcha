# Captcha plugin for Mantisbt

Version 1.0.0
Copyright 2024 Cas Nuy

## description

The Captcha plugin enables captcha functionality during  login.

## Requirements

Mantis 2.x

## Installation

Copy the Captcha directory into the plugins folder of your installation.<br>
After copying to your webserver:<br>
- Start Mantis as administrator<br>
- Select manage<br>
- Select manage Plugins<br>
- Select Install behind Captcha 1.0.0<br>
- For now, no further configuration required.<br>

Since currently no EVENTS have been defined in login.php & login_password_page.php, we need to add them.<br>
I have requested the mantisBT team to provide these events standard  such in future no changes to core are required.<br>

### changes to core files

Edit login.php and add the following line:<br>
event_signal( 'EVENT_LOGIN_HANDLE', gpc_get_string( 'captcha' ) ); <br>
just before:<br>
if( auth_attempt_login( $f_username, $f_password, $f_perm_login ) ) {<br>

Edit login_password_page .php and add the following line:<br>
event_signal( 'EVENT_LOGIN_SHOW' ); ?>; <br>
just before:<br>
if( $t_session_validation ) { ?><br>


## License

Released under the [GPL v3 license](http://opensource.org/licenses/GPL-3.0).

## Credits

This plugin is based upon code from Simon Ugorji ( https://octagon.hashnode.dev/create-a-simple-image-captcha-using-php )

## Support

Please visit https://github.com/mantisbt-plugins/Captcha

## Changes

Version 1.0.0	30-03-2024	Initial release 
