<?php

namespace App\Services;

use App\Interfaces\ApiResultInterface;

class ApiResultService implements ApiResultInterface
{
    public function makeResult(array $result): array
    {
        return compact('result');
    }
}
