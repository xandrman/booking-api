<?php

namespace App\Interfaces;

interface ApiResultInterface
{
    public function makeResult(array $result): array;
}
