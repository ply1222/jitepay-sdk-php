<?php
namespace Jitepay\JitepaySdkPhp;

use Jitepay\JitepaySdkPhp\Request\PayBankRequest;
use Jitepay\JitepaySdkPhp\Request\PrepayRequest;
use Jitepay\JitepaySdkPhp\Request\RefundRequset;

class Pay
{

    private string $host = 'https://api.jitepay.com';

    private AopClient $aop;

    public function __construct()
    {
        $aop = new AopClient();
        $aop->notify_url = "";//https://api.jitepay.com/v1/test
        $this->aop = $aop;
    }

    /**
     * jsapi下单 客户端请求
     * @return void
     */
    public function jsapi()
    {
        $aop = $this->aop;
        $aop->method = 'POST';
        $aop->gatewayUrl = $this->host . '/v1/pay/transactions/jsapi';
        $request = new PrepayRequest();
        $request->setBizContent(json_encode([
            "amount" => [
                "total" => 0.1,// 订单总金额
                "currency" => "CNY",
            ],
            "channel" => "alipay_wap",
            "appid" => "2",
            "mchid" => "2",
            "description" => "test",
            "notify_url" => $aop->notify_url,
            "out_trade_no" => "15452665465296598998",
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

    /**
     * 查询订单 客户端请求
     * @return void
     */
    public function queryOrder()
    {
        $aop = $this->aop;
        $aop->method = 'GET';
        $mchid = "2";
        $aop->gatewayUrl = $this->host . '/v1/pay/transactions/out-trade-no/202212150958497173?mchid=' . $mchid;
        $aop->execute('');
    }

    /**
     * 申请退款 客户端请求
     * @return void
     */
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
            "out_refund_no" => "15452665465296598998",
            "out_trade_no" => "15452665465296598998",
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

    /**
     * 查询退款 客户端请求
     * @return void
     */
    public function queryRefund()
    {
        $aop = $this->aop;
        $aop->method = 'GET';
        $mchid = "2";
        $aop->gatewayUrl = $this->host . '/v1/refund/domestic/refunds/15452665465296598998?mchid=' . $mchid;
        $aop->execute('');
    }

    /**
     * 提现到银行卡
     * @return void
     */
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

    /**
     * 查询付款到银行卡 客户端请求
     * @return void
     */
    public function queryPayBank()
    {
        $aop = $this->aop;
        $aop->method = 'GET';
        $mchid = "2";
        $aop->gatewayUrl = $this->host . '/v1/pay/query_bank/46226621656665566595?mchid=' . $mchid;
        $aop->execute();
    }

    /**
     * 异步回调验证
     * @param array $post
     * @return array
     */
    public function verifyNotify(array $post): array
    {
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
    }

}