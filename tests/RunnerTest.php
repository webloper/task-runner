<?php

declare(strict_types=1);

namespace Webloper\TaskRunner\Tests;

use PHPUnit\Framework\TestCase;
use Webloper\TaskRunner\Runner;
use Webloper\TaskRunner\Tasks\NullTask;
use Webloper\TaskRunner\Tests\Stubs\AddFive;
use Webloper\TaskRunner\Tests\Stubs\AddTwo;

class RunnerTest extends TestCase
{
    protected function runner(
        array $tasks = [],
        array $payload = []
    ): Runner
    {
        return Runner::prepare(
            $tasks,
            $payload
        );
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

        $runner->add(
            $task
        );

        $this->assertNotEmpty(
            $runner->tasks()
        );

        $this->assertCount(
            1,
            $runner->tasks()
        );
    }

    /**
     * @test
     */
    public function it_can_handle_a_task()
    {
        $runner = $this->runner();

        $task = $this->getMockForAbstractClass(NullTask::class);

        $runner->add(
            $task
        );

        $data = [
            'name'  =>  'PHPUnit'
        ];

        $payload = $runner->run(
            $data
        );

        $this->assertNotEmpty(
            $payload
        );

        $this->assertEquals(
            $data,
            $payload
        );
    }

    /**
     * @test
     */
    public function it_handles_the_before_method_on_a_task()
    {
        $runner = $this->runner();

        $runner->add(
            new AddTwo
        );

        $this->assertNotEmpty(
            $runner->tasks()
        );

        $payload = $runner->run(
            ['count' => 1]
        );

        $this->assertNotEmpty(
            $payload
        );

        $this->assertEquals(
            3,
            $payload['count']
        );
    }

    /**
     * @test
     */
    public function it_handles_the_before_and_after_method_on_a_task()
    {
        $runner = $this->runner();

        $runner->add(
            new AddFive
        );

        $this->assertNotEmpty(
            $runner->tasks()
        );

        $payload = $runner->run(
            ['count' => 1]
        );

        $this->assertNotEmpty(
            $payload
        );

        $this->assertEquals(
            11,
            $payload['count']
        );
    }
}
