<?php

declare(strict_types=1);

namespace Webloper\TaskRunner;

use Webloper\TaskRunner\Contracts\TasksContract;

class Runner
{
    protected $tasks = [];

    private function __construct(
        array $tasks = [],
        array $payload = []
    ) {}

    public static function prepare(
        array $tasks = [],
        array $payload = []
    ): Runner {
        return new Runner(
            $tasks,
            $payload
        );
    }

    public function tasks(): array
    {
        return $this->tasks;
    }

    public function add(TasksContract $task): self
    {
        $this->tasks[] = $task;

        return $this;
    }
}
