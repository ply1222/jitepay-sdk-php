<?php

namespace Jitepay\JitepaySdkPhp\Util;

class AesUtil
{
    private string $aes_key = "";

    /**
     * 解密
     *
     * @param string $associatedData 附加数据
     * @param string $nonceStr       加密使用的随机串
     * @param string $ciphertext     数据密文
     *
     * @return string|bool           解密成功|失败
     */
    public function decryptToString($associatedData, $nonceStr, $ciphertext)
    {
        $ciphertext = base64_decode($ciphertext);
        if (strlen($ciphertext) <= 16) {
            return false;
        }
        // openssl (PHP >= 7.1 support AEAD)
        $ctext = substr($ciphertext, 0, -16);
        $authTag = substr($ciphertext, -16);
        return openssl_decrypt($ctext, 'aes-256-gcm', $this->aes_key, OPENSSL_RAW_DATA, $nonceStr,
            $authTag, $associatedData);
    }
}