<?php

use Config\Encryption;
use Config\Services;

if (!function_exists('encrypt')) {
    function encrypt($string)
    {
        $output = false;
        $key = hash('sha256', getenv('secret_key'));
        $iv = substr(hash('sha256', getenv('secret_iv')), 0, 16);
        $output = openssl_encrypt($string, getenv('encrypt_method'), $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }
}

if (!function_exists('decrypt')) {
    function decrypt($string)
    {
        $output = false;
        $key = hash('sha256', getenv('secret_key'));
        $iv = substr(hash('sha256', getenv('secret_iv')), 0, 16);
        $output = openssl_decrypt(base64_decode($string), getenv('encrypt_method'), $key, 0, $iv);
        return $output;
    }
}
