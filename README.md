# jitepay-sdk-php项目
### 概览
#### 功能介绍
1. 实现吉特支付jsapi下单功能
2. 实现吉特支付退款功能
3. 敏感信息加解密
4. 回调通知的验签和解密
5. 付款到银行卡功能

#### 安装
推荐使用PHP包管理工具Composer安装SDK:


#### 开始
私钥:$private_key
公钥:$public_key
商户API证书序列号:$serial_no
AES key:$aes_key 


### 文档
#### 敏感信息加/解密
为了保证通信过程中的敏感信息字段(如用户的真实姓名,银行卡号)

下面以提现到银行卡为例,演示如何进行敏感信息加解密:
```
use Jitepay\JitepaySdkPhp\Util\RSAUtil;

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
```

#### 签名 
你可以使用AopClient::getSign()调起支付是所需的参数签名
```
use Jitepay\JitepaySdkPhp\AopClient;

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
```

#### 回调通知

