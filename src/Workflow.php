<?php

namespace Johnny\Workflow;

class Workflow
{
  protected array $records = [];

  public function add($callable): Workflow
  {
    $this->records[] = [
      'func' => $callable
    ];

    return $this;
  }

  public function run(mixed $context): mixed
  {
    foreach ($this->records as $record) {
      $context = call_user_func($record['func'], $context);

      if (!$context) {
        return null;
      }
    }

    return $context;
  }
}
