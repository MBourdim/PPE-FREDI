<?php
//Generateur de mot de passe
class Utils {
    public static function generatePassword($longueur = 5) {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';

        for($i = 0; $i < $longueur; $i++){
            $string .= $chars[rand(0, strlen($chars)-1)];
        }
        return $string;
    }
}