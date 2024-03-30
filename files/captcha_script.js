<script>
document.addEventListener('DOMContentLoaded', (event) => {
    
var captchaImg = document.querySelector('#captcha_img');
var captchaImgHouse = document.querySelector('#captcha_img_house');

var captchaRefreshBtn = document.querySelector('#btn_captcha_refresh');

captchaRefreshBtn.addEventListener('click', function(){
    captchaImg.src = "plugins/Captcha/pages/captcha_image.php";
});

});
</script>