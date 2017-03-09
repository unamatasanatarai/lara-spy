<?php
namespace Unamatasanatarai\LaraSpy\Handler;

use Log;
use Request;

class DefaultHandler implements HandlerInterface
{

    public function log($subject, $data = null, $userId = null)
    {
        $logText = sprintf('%s | %s | user_id: %s | ip: %s', $subject, json_encode($data), $userId, Request::ip());
        Log::info($logText);

        return true;
    }
}
