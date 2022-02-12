<?php

declare(strict_types=1);

namespace Webloper\TaskRunner\Tests\Stubs;

use Webloper\TaskRunner\Contracts\TasksContract;

class AddTwo implements TasksContract
{
    public function before(array $payload): array
    {
        $payload['count']   =   ($payload['count'] + 1);

        return $payload;
    }

    public function handle(array $payload): array
    {
        $payload['count']   =   ($payload['count'] + 1);

        return $payload;
    }
}
