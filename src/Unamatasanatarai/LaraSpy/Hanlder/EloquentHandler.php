<?php
namespace Unamatasanatarai\LaraSpy\Handler;

use Request;
use Unamatasanatarai\LaraSpy\SpyModel;

class EloquentHandler implements HandlerInterface
{

    public function log($subject, $data = null, $userId = null)
    {
        SpyModel::create([
            'subject' => $subject,
            'data'    => json_encode($data),
            'user'    => $userId,
            'ip'      => Request::ip(),
        ]);

        return true;
    }
}
