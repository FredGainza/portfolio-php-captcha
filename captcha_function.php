<?php

function captcha(){
?>

    <div class="form-group mb-5 col-md-6 mx-auto">
    <label for="captcha" class="mr-3 px-1 mb-2 text-info font-weight-bold">CAPTCHA</label><br>
        <img src="captcha.php?rand=<?php echo rand(); ?>" class="mb-3" id="captcha_image"><br>   
        <a href='javascript: refreshCaptcha();'><i class="fas fa-sync fa-lg mx-2 mb-3"></i>Rafraichir</a><br>
        
        <label for="captcha" class="mr-3 px-1 mb-2">Entrez le code captcha affiché</label><br>
        <input type="text" class="form-control" id="captcha" name="captcha_challenge">
    </div>


<?php
}