# Captcha plugin for Mantisbt

Version 2.1.0
Copyright 2024 Cas Nuy

## description

The Captcha plugin enables captcha functionality during  login.

## Requirements

Mantis 2.x

## Installation

Copy the Captcha directory into the plugins folder of your installation.<br>
Copy the file "login_captcha_page.php" to te root of your mantis installation.<br>
After copying to your webserver:<br>
- Start Mantis as administrator<br>
- Select manage<br>
- Select manage Plugins<br>
- Select Install behind Captcha 2.1.0<br>
- Click on the plugin name for further configuration (se below)<br>

## Configuration

- Set lifetime of the Captcha image (default = 20)
- Set length of the Captcha text (default = 5

## License

Released under the [GPL v3 license](http://opensource.org/licenses/GPL-3.0).

## Credits

This plugin is based upon code from Simon Ugorji ( https://octagon.hashnode.dev/create-a-simple-image-captcha-using-php )
I made it work as a mantisbt plugin.

## Support

Please visit https://github.com/mantisbt-plugins/Captcha

## Changes

Version 1.0.0	30-03-2024	Initial release<br>
Version 1.1.0	02-04-2024	Making use iof the default available event (no changes required anymore to core-files)
