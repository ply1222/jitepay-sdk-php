<?php

namespace Jitepay\JitepaySdkPhp\Util;

class RSAUtil
{
    private string $public_key = '';

    /**
     * 敏感字段加密
     * @param $str
     * @return string
     */
    public function getEncrypt($str)
    {
        //$str是待加密字符串
        $mch_public_key = $this->public_key;
        $mch_public_key = chunk_split($mch_public_key,64,"\n");
        $mch_public_key = "-----BEGIN PUBLIC KEY-----\n" . $mch_public_key . "-----END PUBLIC KEY-----\n";
        $pb_key = openssl_pkey_get_public($mch_public_key);
        if(!$pb_key) die('pb_key 格式不正确');
        $encrypted = '';
        if (openssl_public_encrypt($str, $encrypted, $mch_public_key, OPENSSL_PKCS1_OAEP_PADDING)) {
            //base64编码
            $sign = base64_encode($encrypted);
            return $sign;
        } else {
            echo '加密错误';
        }
    }
}