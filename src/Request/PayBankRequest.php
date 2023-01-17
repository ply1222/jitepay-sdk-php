<?php

namespace Jitepay\JitepaySdkPhp\Request;

class PayBankRequest
{
    private string $amount;//付款到银行卡的金额

    private string $mchid;//商户ID

    private string $appid;//应用ID唯一标识

    private string $out_trade_no;//外部订单号

    private string $description;//描述

    private string $identfy;//银行卡号

    private string $name;//真实姓名

    private string $identify_type;//身份类型

    private string $mobile;//手机号码

    private string $id_card_num;//身份证号

    private array $account = [
        "account_type" => 2,
        "bank_name" => "", //银行名称
        "bank_province" => "", //银行所在省
        "bank_city" => "",       //银行所在市
        "bank_branch_name" => "", //支行名称
    ];

    private string $notify_url;//通知回调地址

    private string $bizContent;

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
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
    public function getIdentfy(): string
    {
        return $this->identfy;
    }

    /**
     * @param string $identfy
     */
    public function setIdentfy(string $identfy): void
    {
        $this->identfy = $identfy;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getIdentifyType(): string
    {
        return $this->identify_type;
    }

    /**
     * @param string $identify_type
     */
    public function setIdentifyType(string $identify_type): void
    {
        $this->identify_type = $identify_type;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     */
    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @return string
     */
    public function getIdCardNum(): string
    {
        return $this->id_card_num;
    }

    /**
     * @param string $id_card_num
     */
    public function setIdCardNum(string $id_card_num): void
    {
        $this->id_card_num = $id_card_num;
    }

    /**
     * @return array
     */
    public function getAccount(): array
    {
        return $this->account;
    }

    /**
     * @param array $account
     */
    public function setAccount(array $account): void
    {
        $this->account = $account;
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