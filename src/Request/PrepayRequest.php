<?php

namespace Jitepay\JitepaySdkPhp\Request;

class PrepayRequest
{
    /**
     * @var string 交易类型
     */
    private string $channel;

    /**
     * @var string 应用ID
     */
    private string $appid;

    /**
     * @var string 商户号
     */
    private string $mchid;

    /**
     * @var string 商品描述
     */
    private string $description;

    /**
     * @var string 商户订单号
     */
    private string $out_trade_no;

    /**
     * @var string 交易结束时间
     */
    private string $time_expire;

    /**
     * @var string 附加数据
     */
    private string $attach;

    /**
     * @var string 通知回调地址
     */
    private string $notify_url;

    /**
     * @var array|string[] 订单金额
     */
    private array $amount = [
        "total" => 0.1,//总金额
        "currency" => "", //货币类型
    ];

    /**
     * @var array|string[] 支付者
     */
    private array $payer = [
        "openid" => "",//用户标识
    ];

    private array $scene_info = [
        "payer_client_ip" => "", //用户终端IP
        "device_id" => "", //商户端设备号
        "type" => "", //支付方式
    ];

    private array $settle_info = [
        "profit_sharing" => false,
    ];

    private string $bizContent;

    /**
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * @param string $channel
     */
    public function setChannel(string $channel): void
    {
        $this->channel = $channel;
    }

    /**
     * @return string
     */
    public function getAppid(): string
    {
        return $this->appid;
    }

    /**
     * @param string $appid
     */
    public function setAppid(string $appid): void
    {
        $this->appid = $appid;
    }

    /**
     * @return string
     */
    public function getMchid(): string
    {
        return $this->mchid;
    }

    /**
     * @param string $mchid
     */
    public function setMchid(string $mchid): void
    {
        $this->mchid = $mchid;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

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
    public function getTimeExpire(): string
    {
        return $this->time_expire;
    }

    /**
     * @param string $time_expire
     */
    public function setTimeExpire(string $time_expire): void
    {
        $this->time_expire = $time_expire;
    }

    /**
     * @return string
     */
    public function getAttach(): string
    {
        return $this->attach;
    }

    /**
     * @param string $attach
     */
    public function setAttach(string $attach): void
    {
        $this->attach = $attach;
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
     * @return array|string[]
     */
    public function getAmount(): array
    {
        return $this->amount;
    }

    /**
     * @param array|string[] $amount
     */
    public function setAmount(array $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return array|string[]
     */
    public function getPayer(): array
    {
        return $this->payer;
    }

    /**
     * @param array|string[] $payer
     */
    public function setPayer(array $payer): void
    {
        $this->payer = $payer;
    }

    /**
     * @return array|string[]
     */
    public function getSceneInfo(): array
    {
        return $this->scene_info;
    }

    /**
     * @param array|string[] $scene_info
     */
    public function setSceneInfo(array $scene_info): void
    {
        $this->scene_info = $scene_info;
    }

    /**
     * @return array|false[]
     */
    public function getSettleInfo(): array
    {
        return $this->settle_info;
    }

    /**
     * @param array|false[] $settle_info
     */
    public function setSettleInfo(array $settle_info): void
    {
        $this->settle_info = $settle_info;
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