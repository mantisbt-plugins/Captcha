# Captcha plugin for Mantisbt

Version 1.2.0
Copyright 2024 Cas Nuy

## description

The Captcha plugin enables captcha and/or Anti_bot_question functionality during login.
You can activate one or both methods.

## Requirements

Mantis 2.x

## Installation

Copy the Captcha directory into the plugins folder of your installation.<br>
Copy the file "login_captcha_page.php" to the root of your mantis installation.<br>
After copying to your webserver:<br>
- Start Mantis as administrator<br>
- Select manage<br>
- Select manage Plugins<br>
- Select Install behind Captcha 1.2.0<br>
- Click on the plugin name for further configuration (see below)<br>

## Configuration

- Set lifetime of the Captcha image (default = 20)
- Set length of the Captcha text (default = 5)
- Switch on/off the Captcha image functionality (default ON)
- Switch on/off the Anti-Bot-Question functionality (default ON)

## License

Released under the [GPL v3 license](http://opensource.org/licenses/GPL-3.0).

## Credits

This plugin is based upon code from Simon Ugorji ( https://octagon.hashnode.dev/create-a-simple-image-captcha-using-php )
The logic for the Anti-Bot question came from https://g-liu.com/blog/2013/08/walkthrough-captcha-php/
I made it work as a mantisbt plugin.

## Support

Please visit https://github.com/mantisbt-plugins/Captcha

## Changes

Version 1.0.0	30-03-2024	Initial release<br>
Version 1.1.0	02-04-2024	Making use iof the default available event (no changes required anymore to core-files)<br>
Version 1.1.1 	03-04-2024  Added focus on input field for entering captcha<br>
Version 1.2.0	10-07-2024	Added option for additional Anti-Bot Question
