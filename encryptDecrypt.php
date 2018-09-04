<?php
    function encrypted($data, $key) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
        return base64_encode($encrypted . '||' . $iv);
    }

    function decrypted($data, $key) {
        list($ciphertext, $iv) = explode('||', base64_decode($data), 2);
        return openssl_decrypt($ciphertext, 'aes-256-cbc', $key, 0, $iv);
    }
?>