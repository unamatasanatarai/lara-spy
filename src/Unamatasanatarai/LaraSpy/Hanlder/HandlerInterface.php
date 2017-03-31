<?php

namespace Unamatasanatarai\LaraSpy\Handler;

interface HandlerInterface
{

    /**
     * @param string $subject    for example: deleted
     * @param string $targetName for example: User
     * @param null   $targetId
     * @param null   $data
     * @param null   $userId
     *
     * @return mixed
     */
    public function log($subject, $targetName, $targetId = null, $data = null, $userId = null);
}
