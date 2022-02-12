<?php

declare(strict_types=1);

namespace Webloper\TaskRunner\Tasks;

use Webloper\TaskRunner\Contracts\TasksContract;

abstract class NullTask implements TasksContract
{
    public function handle(array $payload): array
    {
        return $payload;
    }
}
