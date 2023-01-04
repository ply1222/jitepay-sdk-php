<?php

namespace Ply1222\Manage\aop\request;

class PayBankRequest
{
    private string $amount;//付款到银行卡的金额

    private string $mchid;//商户ID

    private string $appid;//应用ID唯一标识

    private string $out_trade_no;//外部订单号

    private string $description;//描述

    private string $bank_no;//银行卡号

    private string $true_name;//真实姓名

    private string $bank_code;//银行标识代码

    private string $bank_name;//银行名称

    private string $bank_province;//办理银行卡所在省份

    private string $bank_city;//办理银行卡所在城市

    private string $bank_branch_name;//在XX银行的XX分行

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
    public function getBankNo(): string
    {
        return $this->bank_no;
    }

    /**
     * @param string $bank_no
     */
    public function setBankNo(string $bank_no): void
    {
        $this->bank_no = $bank_no;
    }

    /**
     * @return string
     */
    public function getTrueName(): string
    {
        return $this->true_name;
    }

    /**
     * @param string $true_name
     */
    public function setTrueName(string $true_name): void
    {
        $this->true_name = $true_name;
    }

    /**
     * @return string
     */
    public function getBankCode(): string
    {
        return $this->bank_code;
    }

    /**
     * @param string $bank_code
     */
    public function setBankCode(string $bank_code): void
    {
        $this->bank_code = $bank_code;
    }

    /**
     * @return string
     */
    public function getBankName(): string
    {
        return $this->bank_name;
    }

    /**
     * @param string $bank_name
     */
    public function setBankName(string $bank_name): void
    {
        $this->bank_name = $bank_name;
    }

    /**
     * @return string
     */
    public function getBankProvince(): string
    {
        return $this->bank_province;
    }

    /**
     * @param string $bank_province
     */
    public function setBankProvince(string $bank_province): void
    {
        $this->bank_province = $bank_province;
    }

    /**
     * @return string
     */
    public function getBankCity(): string
    {
        return $this->bank_city;
    }

    /**
     * @param string $bank_city
     */
    public function setBankCity(string $bank_city): void
    {
        $this->bank_city = $bank_city;
    }

    /**
     * @return string
     */
    public function getBankBranchName(): string
    {
        return $this->bank_branch_name;
    }

    /**
     * @param string $bank_branch_name
     */
    public function setBankBranchName(string $bank_branch_name): void
    {
        $this->bank_branch_name = $bank_branch_name;
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