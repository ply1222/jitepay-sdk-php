<?php

namespace Ply1222\Manage\aop;

use Ply1222\Manage\Client;

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
    public string $serial_no="DYK60QJXXTDJASYJBTGZC7YTEPKTEBXTQCXCNW2O";

    /**
     * @var string 异步通知回调地址
     */
    public string $notify_url;

    /**
     * @var string 私钥
     */
    public string $private_key = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCreGk1MfNgJd/kV090yJAY3I6Y7X1BVmUxLT1Tlme56AkR1JOrCvIkp5lNX67pgyuf2LQgFmWkIi8galEv2aEY5G3kBuvZ+FSS1WOxclUXeNax3DcRtJ/Xbv7bCu+uOCyuPdDCjqk6Ptgg4uh/qjJfcKO2nM3ovHBR8azGTn+uevSsVQxDvGCRd+xQR+p5g3gPfzpndzErDg2ydngowxwiVuAovWaLAo2xZCMao39xIYP4fc10q/tEQ0rHtlpW9BPKM9T68KqYVKnD+Qk/20Xmt8gLgUxdNdJ20w0HbzYJnsnEmCpv7ammXk60ggfcoIS6oDFH2cUXAZUuF8RzScZ5AgMBAAECggEALDDaHGWFLZBVRUnjJlvSFzYwYeVC1KXpamUYWwR2MwlD3R6F+BzYDu5KqhAwyemOQqHcujBLfaN5tcbwqX5S8FFeqNfHzOMdGMJ58O9gUq5H1orEfoGoeCMY92a4IpRDn5w6wwl1P5eWp9MSzGQWm1YyOwvqXULDR7sbJfhxG4wT7n/ctzYs1vMrqCSbqyRP//q3oGKNOq0CgUzS05EVrwxyz71mZLl3ISnaOq34cH+vU9N9Agze3AdrC/M+Z9X6g4FICEOtAmPE1JXoZk9yklQrqb6l+VKvikOgM0AFxF6A3ll3FRXWWcSP8O/FjFtnqkayKWwT0+O0VVui9b9KAQKBgQDrRLqpVcCg0SFLKn4R6VxfdCXz/7d3bQULgiBZ6C4rvpt6GBFsw2ke7sjRaJYjvkqecQtwYl65vsoNCH1hvbyC3gaC58JkLMIU2uM8b8sL3GEiz+2PvGuPggGWXrdyBLnLg2i1dSGqxA+2LKbpuCV7wzCffXl7eALJHI31YAO0YQKBgQC6lIA8zxSDvkbjLnRF4ODuxPVtZwTJRlKIK8ysawW/fczFRyR4lJVXro3t/EHgAt2whIY02iHVMlGTDz8ekLkuvneJKXdAW0CA9Wlj+/2KQQsqCesa/tBAJy6cWyv5Lv8LVlbfnYHjD9rU9CQi5lpqw4C4cFcsrAHLefhEfW3JGQKBgCGmvQRHjbvy7c4wj8PEG0BT/rG92+IrJ9OTk0kI2sHLC7YVBzkFYl3YTcUWLpOCPm4XQUmb6GytC319v2FhoDsfwtKqj7WAaWpOPL6CRwq1RPeTwikTDFeEgvGdLqQSZPjlHO8Hh/9C9/RYwq8fdc0UCDpn2h589fkKKov0ZdNBAoGAfyRAuq9WSGw6PAdk3lVekfaPVAzWex27keVe5MNNOG9OQcS3+p8toYFmYBz8+tyZGvdDyPI4CeLvKapDFd4DAvJx3HrwM1+7deVF+wc1f6fRJsV5e3zWhlDs90k9juFSlPQx4NGhOAyOz3zKvyl/xa8RoR2UmfFgi7rCzlE2pckCgYEAwhBs5IPRiB8MTDGptASi3BJfNSK5U0ustIHA68MnB9s1LXhLv5G6xhQi9dWpPmFGpD5AF3MgdMbAXwERzh4gVXkiMq38zkodyuFVOi2ixVtJZGEwxcy0t/YU5z8oAkAcjdCagVyTtUd5bm5fjpRnssWIXVFld0ZMaQ5vScPmqF4=";

    /**
     * @var string 公钥
     */
    public string $public_key = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAq3hpNTHzYCXf5FdPdMiQGNyOmO19QVZlMS09U5ZnuegJEdSTqwryJKeZTV+u6YMrn9i0IBZlpCIvIGpRL9mhGORt5Abr2fhUktVjsXJVF3jWsdw3EbSf127+2wrvrjgsrj3Qwo6pOj7YIOLof6oyX3CjtpzN6LxwUfGsxk5/rnr0rFUMQ7xgkXfsUEfqeYN4D386Z3cxKw4NsnZ4KMMcIlbgKL1miwKNsWQjGqN/cSGD+H3NdKv7RENKx7ZaVvQTyjPU+vCqmFSpw/kJP9tF5rfIC4FMXTXSdtMNB282CZ7JxJgqb+2ppl5OtIIH3KCEuqAxR9nFFwGVLhfEc0nGeQIDAQAB";

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
        $url_parts = parse_url($url);
        $timestamp = time();
        $nonce_str = $this->getRandChar();
        $mch_private_key = $this->private_key;
        $mch_private_key = chunk_split($mch_private_key, 64, "\n");
        $mch_private_key = "-----BEGIN RSA PRIVATE KEY-----\n" . $mch_private_key . "-----END RSA PRIVATE KEY-----\n";
        $pi_key = openssl_pkey_get_private($mch_private_key);
        if (!$pi_key) die('$pi_key 格式不正确');
        $canonical_url = ($url_parts['path'] . (!empty($url_parts['query']) ? "?${url_parts['query']}" : ""));
        $message = $http_method . "\n" .
            $canonical_url . "\n" .
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
        ];
        $response = $this->execute($body);

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
        $body = [
            "mchid" => $array['mchid'],
            "appid" => $array['appid'],
            "out_trade_no" => $array['out_trade_no'],
            "description" => $array['description'],
            "bank_no" => $this->getEncrypt($array['bank_no']),
            "true_name" => $this->getEncrypt($array['true_name']),
            "bank_code" => $array['bank_code'],
            "bank_name" => $array['bank_name'],
            "bank_province" => $array['bank_province'],
            "bank_city" => $array['bank_city'],
            "bank_branch_name" => $array['bank_branch_name'],
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
        $mch_private_key = file_get_contents($this->private_key);
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
        if ($post['header']['pay-serial'] == $this->serial_no) {
            return [];
        }

        // 构造验签名串 应答时间戳,应答随机串,应答主体
        $data      = $post['header']['pay-timestamp'] . "\n" . $post['header']['pay-nonce'] . "\n"
            . $post['body'] . "\n";
        $signature = base64_decode($post['header']['pay-signature']);// 解密应答签名
        // 微信支付平台证书,通过java工具下载,并非apiclient_cert.pem
        //$pub_key_id = openssl_pkey_get_public(file_get_contents($this->public_key));
        $mch_public_key = $this->public_key;
        $mch_public_key = chunk_split($mch_public_key,64,"\r\n");
        $mch_public_key = "-----BEGIN PUBLIC KEY-----\r\n" . $mch_public_key . "-----END PUBLIC KEY-----\r\n";
        $pb_key = openssl_pkey_get_public($mch_public_key);
        if(!$pb_key) die('pb_key 格式不正确');
        $ok         = openssl_verify($data, $signature, $mch_public_key, OPENSSL_ALGO_SHA256);
        if ($ok != 1) {
            return [];
        }
        return $post;
    }

    /**
     * 解密
     *
     * @param string $associatedData AES GCM additional authentication data
     * @param string $nonceStr AES GCM nonce
     * @param string $ciphertext AES GCM cipher text
     *
     * @return string|bool      Decrypted string on success or FALSE on failure
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