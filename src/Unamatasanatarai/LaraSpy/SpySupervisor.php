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


    public function log($subject, $data = null, $userId = null)
    {
        $this->handler->log($subject, $data, $userId);
    }
}
