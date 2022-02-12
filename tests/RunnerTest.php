<?php

declare(strict_types=1);

namespace Webloper\TaskRunner\Tests;

use PHPUnit\Framework\TestCase;
use Webloper\TaskRunner\Runner;
use Webloper\TaskRunner\Tasks\NullTask;

class RunnerTest extends TestCase
{
    protected function runner(array $tasks = []): Runner
    {
        return Runner::prepare($tasks);
    }

    /**
     * @test
     */
    public function it_will_build_a_runner()
    {
        $this->assertInstanceOf(
            Runner::class,
            $this->runner(),
        );
    }

    /**
     * @test
     */
    public function it_starts_a_runner_with_empty_array()
    {
        $runner = $this->runner();

        $this->assertIsArray(
            $runner->tasks()
        );

        $this->assertEmpty(
            $runner->tasks()
        );
    }

    /**
     * @test
     */
    public function it_can_add_a_new_task()
    {
        $runner = $this->runner();

        $task = $this->getMockForAbstractClass(NullTask::class);

        $runner->add($task);

        $this->assertNotEmpty(
            $runner->tasks()
        );

        $this->assertCount(
            1,
            $runner->tasks()
        );
    }
}
