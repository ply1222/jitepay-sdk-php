<?php

namespace Jitepay\JitepaySdkPhp\Request;

class RefundRequset
{
    /**
     * @var string 商户订单号
     */
    private string $out_trade_no;

    /**
     * @var string 商户退款单号
     */
    private string $out_refund_no;

    /**
     * @var string 退款原因
     */
    private string $reason;

    /**
     * @var string 通知回调地址
     */
    private string $notify_url;

    /**
     * @var string 退款商品
     */
    private string $funds_account;

    /**
     * @var array 金额信息
     */
    private array $amount = [
        "total" => 0.1, //总金额
        "refund" => 0.1, //退款金额
        "currency" => "", //货币类型
    ];

    /**
     * @var array 退款商品
     */
    private array $goods_detail = [
        "merchant_goods_id" => "", //商户侧商品编码
        "goods_name" => "", //商品名称
        "unit_price" => 0.1, //商品单价
        "refund_amount" => 0.1, //商品退款金额
        "refund_quantity" => 1, //商品退货数量
    ];

    private string $bizContent;

    /**
     * @return string
     */
    public function getOutTradeNo(): string
    {
        return $this->out_trade_no;
    }

    /**
     * @param string $out_trade_no
     */
    public function setOutTradeNo(string $out_trade_no): void
    {
        $this->out_trade_no = $out_trade_no;
    }

    /**
     * @return string
     */
    public function getOutRefundNo(): string
    {
        return $this->out_refund_no;
    }

    /**
     * @param string $out_refund_no
     */
    public function setOutRefundNo(string $out_refund_no): void
    {
        $this->out_refund_no = $out_refund_no;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public function getNotifyUrl(): string
    {
        return $this->notify_url;
    }

    /**
     * @param string $notify_url
     */
    public function setNotifyUrl(string $notify_url): void
    {
        $this->notify_url = $notify_url;
    }

    /**
     * @return string
     */
    public function getFundsAccount(): string
    {
        return $this->funds_account;
    }

    /**
     * @param string $funds_account
     */
    public function setFundsAccount(string $funds_account): void
    {
        $this->funds_account = $funds_account;
    }

    /**
     * @return array
     */
    public function getAmount(): array
    {
        return $this->amount;
    }

    /**
     * @param array $amount
     */
    public function setAmount(array $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return array
     */
    public function getGoodsDetail(): array
    {
        return $this->goods_detail;
    }

    /**
     * @param array $goods_detail
     */
    public function setGoodsDetail(array $goods_detail): void
    {
        $this->goods_detail = $goods_detail;
    }

    /**
     * @return string
     */
    public function getBizContent(): string
    {
        return $this->bizContent;
    }

    /**
     * @param string $bizContent
     */
    public function setBizContent(string $bizContent): void
    {
        $this->bizContent = $bizContent;
    }
}