<?php
namespace Jitepay\JitepaySdkPhp;

require_once(dirname(__FILE__).'/Pay.php');


class Notify
{

    public function em_getallheaders()
    {
        $headers = [];
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }

    /**
     * 记录日志
     * @param mixed $msg 消息内容
     * @param string $type 消息类型 debug, info, notice, warning, error, critical, alert, emergency
     * @param int $mode 写入方式 0:file_put_contents(),1:fwrite(),2:error_log()
     * @return boolean
     */
    public function write($msg, $type = 'info', $mode = 0)
    {
        $dir = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'log' . DIRECTORY_SEPARATOR;
        $path = $dir . date('Ym') . DIRECTORY_SEPARATOR;
        $filename = $path . DIRECTORY_SEPARATOR . date('d') . '.log';

        // 创建目录
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        // 写入内容
        $msg = is_string($msg) ? $msg : var_export($msg, true);
        $string = '[' . date('c') . '][' . $type . '] ' . $msg . "\r\n";

        // 写入方式
        if ($mode == 0) {
            file_put_contents($filename, $string, FILE_APPEND | LOCK_EX);
        } elseif ($mode == 1) {
            $fp = fopen($filename, 'a');
            if (flock($fp, LOCK_EX)) {// 进行排它型锁定 并发
                ftruncate($fp, 0);// truncate file
                fwrite($fp, $string);
                fflush($fp);// flush output before releasing the lock
                flock($fp, LOCK_UN);// 释放锁定
            }
            fclose($fp);
        } else {
            error_log($string, 3, $filename);
        }
        return true;
    }
}

$notify = new Notify();

$header = $notify->em_getallheaders();
$body = file_get_contents("php://input");
// 验证签名

$result = (new Pay)->verifyNotify(compact('header','body'));//compact('header', 'body')
$notify->write($result);
if (!$result) {
    $notify->write(['code' => "ERROR", "message" => "失败"]);
    return ['code' => "ERROR", "message" => "失败"];
}