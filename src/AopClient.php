<?php

namespace Jitepay\JitepaySdkPhp;

use Jitepay\JitepaySdkPhp\Exception\ValidationException;

require_once(dirname(__FILE__).'/../tests/Notify.php');

class AopClient
{
    /**
     * @var string 应用唯一标识
     */
    public string $appid;

    /**
     * @var string 应用密钥 AppSecret
     */
    public string $secret;

    /**
     * @var string 微信支付分配的商户号
     */
    public string $mchid="2";

    /**
     * @var string 商户API证书序列号
     */
    public string $serial_no = "d14fea32f79b52f03d7a7624a711a6ec";

    /**
     * @var string 异步通知回调地址
     */
    public string $notify_url = "http://m.huoxunnet.cn/tests/Notify.php";

    /**
     * @var string RSA私钥
     */
    public string $private_key = "MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCi4ctoc+5Rvxju1zXUDeip5Hk6SJFvDLZGdCFNH4fA4ZYUHxp8jGFlNASfD6Y94AKGvHL1iEk/E6hGJloR5xYh8oeQ5iL59f6n3/yPgO8Yj4aO1EHdGXAob6dArSIG7fFZGyV0IqxbmwNRoTMBGfsypdMLR3iwZz6sB78WOyJWrV8lUdSZ7oDLp+kq2zvplXOUTxS+JnMIc2m+yPSPGq8J1+pbN9CPgA81lpM64TuIQYv/PtISMk/1l2oWH3mCeAsnIGSCzx+dKxj9cqfH5WNtsNxM8//hxT+l0UXRqou5oysvQhCltxjLRN3oXPFI3MrbLWzfNiEm1MvB7JRMTrRTAgMBAAECggEASV1osEifjKSFh3baIQSOyo9FZ1IuZ5WTOFKweTt9ewxg+/kyhez5JYtzlW2IFJCksqmJIjzbuRSSk95MbYnntyy1kTeHg40gwd6qtLx/dVGYaxcB/6OomB4KeKBDFlnwfpEyoofHmI9OxGLWRWW9doeocokjvFkUqonmsQ27nsxJ50GbT+LgT/WqB/r+T+IihLq6LdcjBlwQC/WfrNHldpMupPtvGmO0vcC09lNBGD5F+h7CisoJJgbU7kXu+cgbHGBD7Nq+rEvLgFHnjl9ipCSHgokEcKe82NaF4yc3+W1dA0v6XkjdLj8h7Znn2WDTo3zeITXGlfOxyugN0SE2qQKBgQDdMHsb9APRIH59PqJFD89jL8jL7hs7vEAZdk9cokW0+W172vmagW7pwmRfQvergb8Ja2Gug/F9oed7gyBgs5nby9UZIWTe3KtX6frVRoihvXb9Yi18rMJ9lY7LtP+3p0jj63L0DdNn7YAmFweA0pOybyj6x9y+kBnrx9nX6OMnhQKBgQC8hCmq7JPh89YoexCpQoys54Bacobb+1sSrKBhJ7rTvtZ2Knj1BbVdh8EijdI9KknyZ48U66z+I6R1b/70u8MPB81GAuOTMPVaexUHEPORtUxElTWLlCmfkYbnivqjo7dWfxxgeEJc/G5me1TI89sRmkwm+Gpkt0Qtof9xNu439wKBgGIUEUK/3MFqaywWDdYZwJf2pE7o8eJ3AuVHdMFaoxYwU7/LxUohgpDcxa0IANJn4dHHb7T2hKp0lDRMXJsEiIDRzVgrWpMHvmJpOfRAJm2xmYWZdxoFcOhG3N6vD4TcBJIr4Pke+FLpGR3KsGUK+rrwV3d8EAHf296U65+1gKQRAoGAMLIvFUDxXl+fRWusvRw8vHk8daC5519BgkxnTVF2+DWGrpWAE0L7O4LSx/s8gKJI4b4QfsX2NNu+IrvgbxWFaH+KbfhXEvGFn27F2sJtOIlNfzXP1BNcwSRVZcBHyDeFJ2nEScMm2WA3oG9hUltzjlN+Ml7fFM8mZGdBVdxrorcCgYA4ULjrjTawADV1oVDSxiLRDBcWVeQxdjWZNt1ZLLG4g11DMr0FKv6zEvFPbX1URwjBwFfHIXe/qJmYyUf+q6F8h4SUWuW2y5knqazjxCDlQzG2SsFF0cqpDlnQhfEV/IzwEL+sYPglfkGRBjwuU1h7mMi7nIan1xbCt+/75qN/6w==";

    /**
     * @var string RSA公钥
     */
    public string $public_key = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAouHLaHPuUb8Y7tc11A3oqeR5OkiRbwy2RnQhTR+HwOGWFB8afIxhZTQEnw+mPeAChrxy9YhJPxOoRiZaEecWIfKHkOYi+fX+p9/8j4DvGI+GjtRB3RlwKG+nQK0iBu3xWRsldCKsW5sDUaEzARn7MqXTC0d4sGc+rAe/FjsiVq1fJVHUme6Ay6fpKts76ZVzlE8UviZzCHNpvsj0jxqvCdfqWzfQj4APNZaTOuE7iEGL/z7SEjJP9ZdqFh95gngLJyBkgs8fnSsY/XKnx+VjbbDcTPP/4cU/pdFF0aqLuaMrL0IQpbcYy0Td6FzxSNzK2y1s3zYhJtTLweyUTE60UwIDAQAB";

    /**
     * @var string AES密钥
     */
    public string $api_key = "VMjuVYmRy7E3qlx8tSkjlSmxj3Dvm5U8";

    /**
     * @var string 网关
     */
    public string $gatewayUrl = "";

    /**
     * @var string 返回数据格式
     */
    public string $format = "json";

    /**
     * @var string api版本
     */
    public string $apiVersion = "1.0";

    /**
     * @var string 请求方式
     */
    public string $method = 'GET';

    /**
     * 签名生成
     * @return string
     */
    public function auth($url, $http_method = 'GET', $body = '')
    {
        // Authorization: <schema> <token>
        //$url_parts = parse_url($url);
        $timestamp = time();
        $nonce_str = $this->getRandChar();
        $mch_private_key = $this->private_key;
        $mch_private_key = chunk_split($mch_private_key, 64, "\n");
        $mch_private_key = "-----BEGIN RSA PRIVATE KEY-----\n" . $mch_private_key . "-----END RSA PRIVATE KEY-----\n";
        $pi_key = openssl_pkey_get_private($mch_private_key);
        if (!$pi_key) die('$pi_key 格式不正确');
        //$canonical_url = ($url_parts['path'] . (!empty($url_parts['query']) ? "?${url_parts['query']}" : ""));
        $message = $http_method . "\n" .
            $url . "\n" .
            $timestamp . "\n" .
            $nonce_str . "\n" .
            $body . "\n";
        openssl_sign($message, $raw_sign, $pi_key, OPENSSL_ALGO_SHA256);//sha256WithRSAEncryption
        $sign = base64_encode($raw_sign);
//        $mch_public_key = $this->public_key;
//        $mch_public_key = chunk_split($mch_public_key,64,"\n");
//        $mch_public_key = "-----BEGIN PUBLIC KEY-----\n" . $mch_public_key . "-----END PUBLIC KEY-----\n";
//        $pb_key = openssl_pkey_get_public($mch_public_key);
//        if(!$pb_key) die('pb_key 格式不正确');
//        $result = (bool)openssl_verify($message, base64_decode($sign), $pb_key, OPENSSL_ALGO_SHA256);//验签
//        if(!$result) die('验签失败');
//        halt($result);
//        openssl_free_key($pb_key);
        $schema = 'PAY-SHA256-RSA2048';
        $token = sprintf('mchid="%s",nonce_str="%s",timestamp="%d",serial_no="%s",signature="%s"',
            $this->mchid, $nonce_str, $timestamp, $this->serial_no, $sign);
        return $schema . ' ' . $token;
    }

    //jsapi下单
    public function pay($request)
    {
        $array = json_decode($request->getbizContent(), true);
        $body = [
            "appid" => $array['appid'],
            "mchid" => $array['mchid'],
            "channel" => $array['channel'],
            "description" => $array['description'],//商品描述
            "out_trade_no" => $array['out_trade_no'],//商户订单号
            "notify_url" => $this->notify_url,//通知地址
            "amount" => $array['amount'],
            "payer" => $array['payer'],
            "scene_info" => $array['scene_info'],
            "settle_info" => $array['settle_info'],
            "detail" => $array['detail']
        ];
        $response = $this->execute($body);
        var_dump($response);

//        //调起支付API
//        $data["appid"] = $this->appid;//应用ID
//        $data["partnerid"] = $this->mchid;//商户号
//        $data["prepayid"] = $response['body']['prepay_id'];//预支付交易会话ID
//        $data["package"] = "Sign=WXPay";//扩展字段
//        $data["noncestr"] = $this->getRandChar();//随机字符串
//        $data["timestamp"] = time();//时间戳
//        $data["sign"] = $this->getSign($data);//签名
//        return json_encode($data);
    }

    //退款
    public function refundOrder($request)
    {
        $array = json_decode($request->getbizContent(),true);
        $body = [
            "amount" => $array['amount'],
            "reason" => $array['reason'],
            "funds_account" => $array['funds_account'],
            "notify_url" => $array['notify_url'],
            "out_refund_no" => $array['out_refund_no'],
            "out_trade_no" => $array['out_trade_no'],
            "goods_detail" => $array['goods_detail'],
        ];
        $this->execute($body);
    }

    //提现
    public function withdraw($request)
    {
        $array = json_decode($request->getBizContent(),true);

        //订单号
        if (empty($array['out_trade_no'])) {
            throw new ValidationException("OutTradeNo cannot be empty");
        }

        //类型
        if (empty($array['payee']['identity_type'])) {
            throw new ValidationException("IdentityType cannot be empty");
        }

        //银行卡号
        if (empty($array['payee']['identity'])) {
            throw new ValidationException("Identity cannot be empty");
        }
        $array['payee']['identity'] = $this->getEncrypt($array['payee']['identity']);

        //真实姓名
        if (empty($array['payee']['name'])){
            throw new ValidationException("Name cannot be empty");
        }
        $array['payee']['name'] = $this->getEncrypt($array['payee']['name']);

        //手机号码
        if (!empty($array['mobile'])) {
            $this->getEncrypt($array['mobile']);
        }

        //身份证号码
        if(!empty($array['id_card_num'])) {
            $this->getEncrypt($array['id_card_num']);
        }

        //金额
        if (empty($array['amount'])) {
            throw new ValidationException("Amount cannot be empty");
        }

        //描述
        if (empty($array["remark"])) {
            throw new ValidationException("Remark cannot be empty");
        }

        $body = [
            "mchid" => $array['mchid'],
            "appid" => $array['appid'],
            "out_trade_no" => $array['out_trade_no'],
            "remark" => $array['remark'],
            "payee" => $array['payee'],
            "amount" => $array['amount'],
            "notify_url" => $array['notify_url'],
        ];
        $this->execute($body);
    }

    public function execute( $body = '' )
    {
        $client = new Client();
        if($this->method ==='POST') {
            $resp = $client->request(
                $this->method,
                $this->gatewayUrl, //请求URL
                [
                    'headers' => [
                        'Accept: application/json',
                        'Content-Type: application/json',
                        'User-Agent:' . $_SERVER['HTTP_USER_AGENT'],
                        'Authorization:' . $this->auth($this->gatewayUrl, $this->method, json_encode($body))
                    ],
                    'json' => $body// JSON请求体
                ],
            );
            //halt($this->auth($this->gatewayUrl, $this->method, json_encode($body)));
        } else {
            $resp = $client->request(
                $this->method,
                $this->gatewayUrl, //请求URL
                [
                    'headers' => [
                        'Accept: application/json',
                        'Content-Type: application/json',
                        'User-Agent:' . $_SERVER['HTTP_USER_AGENT'],
                        'Authorization:' . $this->auth($this->gatewayUrl, $this->method, $body)
                    ],
                ],
            );
        }
        $statusCode = $resp->getStatusCode();
        if ($statusCode == 200) { //处理成功
            return $resp->getBody();
        } else if ($statusCode == 204) { //处理成功，无返回Body
            return [];
        }
        return [];
    }

    /**
     * 作用：产生随机字符串，不长于32位
     * @param $length int
     * @return string
     */
    function getRandChar($length = 32)
    {
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol) - 1;
        for ($i = 0; $i < $length; $i++) {
            $str .= $strPol[rand(0, $max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }
        return $str;
    }

    /**
     * 签名计算
     * @param array $data
     * @return string
     */
    public function getSign($data)
    {
        $mch_private_key = $this->private_key;
        $mch_private_key = chunk_split($mch_private_key, 64, "\n");
        $mch_private_key = "-----BEGIN RSA PRIVATE KEY-----\n" . $mch_private_key . "-----END RSA PRIVATE KEY-----\n";
        $pi_key = openssl_pkey_get_private($mch_private_key);
        if (!$pi_key) die('$pi_key 格式不正确');
        //$mch_private_key = file_get_contents($this->private_key);
        $message = $this->appid . "\n" .
            $data['timestamp'] . "\n" .
            $data['noncestr'] . "\n" .
            $data['prepayid'] . "\n";
        openssl_sign($message, $raw_sign, $mch_private_key, 'sha256WithRSAEncryption');
        return base64_encode($raw_sign);
    }

    /**
     * 敏感字段加密
     * @param $str
     * @return string
     */
    private function getEncrypt($str)
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

    /**
     * 异步回调验证
     * @param array $post
     * @return array
     */
    public function verifyNotify(array $post): array
    {
        // 检查平台证书序列号
        if ($post['header']['Pay-Serial'] !== $this->serial_no) {
            return [];
        }
        (new Notify)->write($post);

        // 构造验签名串 应答时间戳,应答随机串,应答主体
        $data      = $post['header']['Pay-Timestamp'] . "\n" . $post['header']['Pay-Nonce'] . "\n"
            . $post['body'] . "\n";
        $signature = base64_decode($post['header']['Pay-Signature']);// 解密应答签名
        // 微信支付平台证书,通过java工具下载,并非apiclient_cert.pem
        //$pub_key_id = openssl_pkey_get_public(file_get_contents($this->public_key));
        $mch_public_key = $this->public_key;
        (new Notify)->write($mch_public_key);
        $mch_public_key = chunk_split($mch_public_key,64,"\n");
        $mch_public_key = "-----BEGIN PUBLIC KEY-----\n" . $mch_public_key . "-----END PUBLIC KEY-----\n";
        $pb_key = openssl_pkey_get_public($mch_public_key);
        if(!$pb_key) die('pb_key 格式不正确');
        $ok         = openssl_verify($data, $signature, $mch_public_key, OPENSSL_ALGO_SHA256);
        (new Notify)->write($ok);
        if ($ok != 1) {
            return [];
        }
        return $post;
    }

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
        $notify = new Notify();
        $ciphertext = base64_decode($ciphertext);
        if (strlen($ciphertext) <= 16) {
            return false;
        }
        // openssl (PHP >= 7.1 support AEAD)
        $ctext = substr($ciphertext, 0, -16);
        $notify->write($ctext);
        $notify->write($ciphertext);
        $authTag = substr($ciphertext, -16);
        $notify->write($authTag);
        $notify->write($this->api_key);
        $notify->write($nonceStr);
        $notify->write(openssl_decrypt($ctext, 'aes-256-gcm', $this->api_key, OPENSSL_RAW_DATA, $nonceStr,
            $authTag, $associatedData));
        return openssl_decrypt($ctext, 'aes-256-gcm', $this->api_key, OPENSSL_RAW_DATA, $nonceStr,
            $authTag, $associatedData);
    }
}