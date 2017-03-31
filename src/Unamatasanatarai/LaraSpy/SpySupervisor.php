<?php

namespace Unamatasanatarai\LaraSpy;

use Unamatasanatarai\LaraSpy\Handler\HandlerInterface;

class SpySupervisor
{

    private $handler;

    public function __construct(HandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    public function log($subject, $targetName, $targetId = null, $data = null, $userId = null)
    {
        $this->handler->log($subject, $targetName, $targetId, $data, $userId);
    }
}
