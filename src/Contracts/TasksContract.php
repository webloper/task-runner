<?php

declare(strict_types=1);

namespace Webloper\TaskRunner\Contracts;

interface TasksContract
{
    public function handle(array $payload): array;
}
