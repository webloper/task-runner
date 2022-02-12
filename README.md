# Task Runner

[![tests](https://github.com/webloper/task-runner/actions/workflows/tests.yml/badge.svg)](https://github.com/webloper/task-runner/actions/workflows/tests.yml)

A very simple task runner in PHP 8.


## Installation

```bash
$ composer require webloper/task-runner
```

## Usage

```php
$runner = Runner::prepare([]);

$task = new AddOne();

$runner->add($task);
$runner->run();
```
