<?php

namespace Jitepay\JitepaySdkPhp;

class Client
{
    private array $option;

    private int $statusCode;

    private $header;

    private $result;

    private $body;

    private $contents;

    /**
     * 初始化
     * @param array $option
     */
    public function __construct(array $option = [])
    {
        $this->option = $option;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setHeader($header)
    {
        $this->header = $header;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setContents($contents)
    {
        $this->contents = $contents;
    }

    public function getContents()
    {
        return $this->contents;
    }

    public function get(string $url, array $options = []): Client
    {
        return $this->request('GET', $url, $options);
    }

    public function post(string $url, array $options = []): Client
    {
        return $this->request('POST', $url, $options);
    }

    public function put(string $url, array $options = []): Client
    {
        return $this->request('PUT', $url, $options);
    }

    public function delete(string $url, array $options = []): Client
    {
        return $this->request('DELETE', $url, $options);
    }

    /**
     * 发起请求
     * @param string $method GET,POST,PUT,DELETE,PATCH
     * @param string $url
     * @param array $options
     * @return Client
     */
    public function request(string $method, string $url, array $options = []): Client
    {
        $url = isset($this->option['base_uri']) ? $this->option['base_uri'] . $url : $url;

        $curl = curl_init();//初始化
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);//请求方式
        curl_setopt($curl, CURLOPT_URL, $url);//设置访问的URL
        if (isset($options['headers'])) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $options['headers']);
        }
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//只获取页面内容，但不输出
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$" . $url, "https://")) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//不做服务器认证
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);//不做客户端认证
        }
        if (isset($options['json'])) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($options['json']));
        }
        if (isset($options['body'])) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $options['body']);
        }
        if (isset($options['form_params'])) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $options['form_params']);
        }

        $result      = curl_exec($curl);//执行访问，返回结果
        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $rheader     = substr($result, 0, $header_size);
        $rbody       = substr($result, $header_size);
        $httpCode    = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);//关闭curl，释放资源

        $this->setStatusCode($httpCode);
        $this->setHeader($rheader);
        $this->setResult($result);
        $this->setBody(json_decode($rbody, true));
        $this->setContents($rbody);

        return $this;
    }

    /**
     * 文件
     * @param string $filename
     * @param bool $base64
     * @return string
     */
    public function file(string $filename, bool $base64 = true): string
    {
        //对path进行判断，如果是本地文件就二进制读取并base64编码，如果是url,则返回
        $data = "";
        if (substr($filename, 0, strlen("http")) === "http") {
            $data = $filename;
        } else {
            $data = file_get_contents($filename);
            //if ($fp = fopen($filename, "rb", 0)) {
            //    $binary = fread($fp, filesize($filename)); // 文件读取
            //    fclose($fp);
            //    $data = base64_encode($binary); // 转码
            //}
            if ($base64) {
                $data = base64_encode($data); // 转码
            }
        }
        return $data;
    }
}