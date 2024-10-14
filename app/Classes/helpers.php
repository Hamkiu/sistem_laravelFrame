<?php
    if (!function_exists('encode')) {
        function encode($param) {
            $encoded = \Illuminate\Support\Facades\Crypt::encryptString($param);

            return $encoded;
        }
    }

    if (!function_exists('decode')) {
        function decode($param) {
            $decoded = \Illuminate\Support\Facades\Crypt::decryptString($param);

            return $decoded;
        }
    }
?>