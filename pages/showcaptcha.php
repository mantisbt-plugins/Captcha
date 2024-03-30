<?php 
include "plugins/Captcha/files/captcha_script.js";
?>
</script>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<div class="captcha-container">
	<div class="captcha">
		<img id="captcha_img" src="plugins/Captcha/pages/captcha_image.php">  <button title="Click to refresh image" id="btn_captcha_refresh" type="button">&#8635;</button>
		        <label id="captcha_form_label">Enter Text</label>
        <input id="captcha_inp" name="captcha">  
    </div>
</div>