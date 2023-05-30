<?php
function generatePassword() {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!#$123456789';
    $password = '';
    
    $charLength = strlen($characters);
    for ($i = 0; $i < 8; $i++) {
        $randomIndex = mt_rand(0, $charLength - 1);
        $password .= $characters[$randomIndex];
    }
    
    return $password;
}



?>