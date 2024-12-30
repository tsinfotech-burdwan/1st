<?php
    session_start();
    $captcha = rand(100000, 999999);
    $_SESSION["bm_captcha_code_with_passkey"] = $captcha;  
    $im = imagecreatetruecolor(100, 24);  
    $bg = imagecolorallocate($im, 22, 100, 165);
    $fg = imagecolorallocate($im, 255, 255, 255);
    imagefill($im, 0, 0, $bg); 
    imagestring($im, rand(1, 7), rand(1, 7),rand(1, 7),  $captcha, $fg);
    header("Cache-Control: no-store,no-cache, must-revalidate"); 
    header('Content-type: image/png');
    imagepng($im); 
    imagedestroy($im);
?> 