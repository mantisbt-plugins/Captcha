<?php
$seconds = plugin_config_get( 'lifetime' );
?>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
var captchaImg = document.querySelector('#captcha_img');
var captchaImgHouse = document.querySelector('#captcha_img_house');
var captchaRefreshBtn = document.querySelector('#btn_captcha_refresh');
captchaRefreshBtn.addEventListener('click', function(){
	location.reload();
    captchaImg.src = "plugins/Captcha/pages/captcha_image.php";
	});
});

var intCountDown = <?php echo $seconds; ?>;
 
function countDown(){
   if(intCountDown < 0) {
	location.reload();
	cntdwn.innerText = " <?php echo lang_get( 'plugin_Captcha_refresh' ) ?> ";
	return;
   }
   cntdwn.innerText = intCountDown--;
   setTimeout("countDown()",1000);
}
</script>