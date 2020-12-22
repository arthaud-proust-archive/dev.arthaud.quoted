<?php
use Hashids\Hashids;


if(!function_exists('encodeId')) {
    function encodeId($id) {
        $hashids = new Hashids('', 5);
        return $hashids->encode($id);
    }
}

if(!function_exists('decodeId')) {
    function decodeId($hashid) {
        $hashids = new Hashids('', 5);
        try {
            return $hashids->decode($hashid)[0];
        } catch(Exception $e) {
            abort('404');
        }
    }
}