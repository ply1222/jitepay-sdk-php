## jitepay-sdk-php项目
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

#### Jsapi下单
```PHP
public function jsapi()
{
    $aop = $this->aop;
    $aop->method = 'POST';
    $aop->gatewayUrl = $this->host . '/v1/pay/transactions/jsapi';
    $request = new PrepayRequest();
    $request->setBizContent(json_encode([
        "amount" => [
            "total" => 0.01,// 订单总金额
            "currency" => "CNY",
        ],
        "channel" => "wx_pub",
        "appid" => "2",
        "mchid" => "2",
        "description" => "test",
        "notify_url" => $aop->notify_url,
        "out_trade_no" => date('YmdHis'),
        "payer" => [
            "openid" => ""
        ],
        "scene_info" => [
            "payer_client_ip" => "127.0.0.1"
        ],
        "settle_info" => [
            "profit_sharing" => ""
        ]
    ]));
    $aop->pay($request);
}
```

#### 订单查询
```PHP
public function queryOrder()
{
    $aop = $this->aop;
    $aop->method = 'GET';
    $mchid = "2";
    $aop->gatewayUrl = $this->host . '/v1/pay/transactions/out-trade-no/202212150958497173?mchid=' . $mchid;
    $aop->execute('');
}
```

#### 退款订单
```PHP
public function refund()
{
    $aop = $this->aop;
    $aop->method = 'POST';
    $aop->gatewayUrl = $this->host . '/v1/refund/domestic/refunds';
    $request = new RefundRequset();
    $request->setBizContent(json_encode([
        "amount" => [
            "refund" => 0.1,//退款金额
            "total" => 0.1,// 订单总金额
            "currency" => "CNY",//退款币种
        ],
        "reason" => "test",//退款原因
        "funds_account" => "AVAILABLE",
        "notify_url" => $aop->notify_url,
        "out_refund_no" => "",
        "out_trade_no" => "",
        "goods_detail" => [
            "merchant_goods_id" => "111",
            "wechatpay_goods_id" => "",
            "goods_name" => "",
            "unit_price" => "",
            "refund_amount" => 0.1,
            "refund_quanity" => 1,
        ]
    ]));
    $aop->refundOrder($request);
}
```

#### 退款订单查询
```PHP
public function queryRefund()
{
    $aop = $this->aop;
    $aop->method = 'GET';
    $mchid = "2";
    $aop->gatewayUrl = $this->host . '/v1/refund/domestic/refunds/15452665465296598998?mchid=' . $mchid;
    $aop->execute('');
}
```

#### 转账
```PHP
public function payBank()
{
    $aop = $this->aop;
    $aop->method = 'POST';
    $aop->gatewayUrl = $this->host . '/v1/pay/pay_bank';
    $request = new PayBankRequest();
    $request->setBizContent(json_encode([
        "mchid" => "2",
        "appid" => "2",
        "out_trade_no" => "46226621656665566595",
        "description" => "test",
        "bank_no" => "6236691370002321599",
        "true_name" => "彭玲艳",
        "bank_code" => "CCB",
        "bank_name" => "中国建设银行",
        "bank_province" => "江苏省",
        "bank_city" => "南京",
        "bank_branch_name" => "建行",
        "amount" => "0.1",
        "notify_url" => $aop->notify_url,
    ]));
    $aop->withdraw($request);
}
```

#### 转账查询
```PHP
public function queryPayBank()
{
    $aop = $this->aop;
    $aop->method = 'GET';
    $mchid = "2";
    $aop->gatewayUrl = $this->host . '/v1/pay/query_bank/46226621656665566595?mchid=' . $mchid;
    $aop->execute();
}
```

#### 敏感信息加/解密
为了保证通信过程中的敏感信息字段(如用户的真实姓名,银行卡号)

下面以提现到银行卡为例,演示如何进行敏感信息加解密:
```PHP
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
```PHP
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
```

#### 回调通知验证及解密
回调通知受限于开发者/商户数所使用的WebServer有很大差异,这里只给开发指导步骤,以供开发实现.
1. 从请求头部Header,拿到Pay-Signature、Pay-Nonce、Pay-Timestamp、Pay-Serial，商户侧Web解决方案可能有差异，请求头可能大小写不敏感，请根据自身应用来决定；
2. 获取请求body体的JSON纯文本；
3. 验证Pay-signature签名是否正确；需要用到验签密钥$public_key;
4. 消息体$body解密,需要用到aesKey($api_key);
样例代码如下:
```PHP
require_once(dirname(__FILE__).'/../src/AopClient.php');

// 检查平台证书序列号
$post = $this->aop->verifyNotify($post);
$body = json_decode($post['body'], true);
if ($body['event_type'] == 'TRANSACTION.SUCCESS') {
    $resource = $this->aop->decryptToString($body['resource']['associated_data'], $body['resource']['nonce'], $body['resource']['ciphertext']);
    $resource = json_decode($resource, true);
    // 通知类型:支付通知,退款通知
    if ($resource['trade_state'] == 'SUCCESS' || $resource['trade_state'] == 'REFUND.SUCCESS') {
        return $resource;
        // 用户微信绑定openid
        //$openid = $resource['payer']['openid'];
    }
}
return $body;
```


