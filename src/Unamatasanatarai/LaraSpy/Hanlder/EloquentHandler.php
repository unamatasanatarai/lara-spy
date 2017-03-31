<?php

namespace Unamatasanatarai\LaraSpy\Handler;

use Request;
use Unamatasanatarai\LaraSpy\SpyModel;

class EloquentHandler implements HandlerInterface
{

    public function log($subject, $targetName, $targetId = null, $data = null, $userId = null)
    {
        SpyModel::create(
            [
                'subject'     => $subject,
                'target_name' => $targetName,
                'target_id'   => $targetId,
                'data'        => json_encode($data),
                'user'        => $userId,
                'ip'          => Request::ip(),
            ]
        );

        return true;
    }
}
