# Task Runner

A very simple task runner in PHP 8.


## Installation

```bash
$ composer require webloper/task-runner
```

```php
$runner = Runner::prepare([]);
$runner->add();
$runner->run();
```