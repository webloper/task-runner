# Task Runner

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
