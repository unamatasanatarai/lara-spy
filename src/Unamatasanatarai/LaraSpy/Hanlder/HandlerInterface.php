<?php
namespace Unamatasanatarai\LaraSpy\Handler;

interface HandlerInterface
{

    public function log($subject, $data = null, $userId = null);
}
