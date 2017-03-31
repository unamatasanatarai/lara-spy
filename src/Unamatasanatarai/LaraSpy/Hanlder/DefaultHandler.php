<?php

namespace Unamatasanatarai\LaraSpy\Handler;

use Log;
use Request;

class DefaultHandler implements HandlerInterface
{

    public function log($subject, $targetName, $targetId = null, $data = null, $userId = null)
    {
        $logText = sprintf(
            'user_id: %s | %s | %s [%s] | %s | ip: %s',
            $userId,
            $subject,
            $targetName,
            $targetId,
            json_encode($data),
            Request::ip()
        );
        Log::info($logText);

        return true;
    }
}
