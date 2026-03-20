<?php

namespace Johnny\Workflow;

class Workflow
{
    protected array $steps = [];
    protected $onSuccess = null;
    protected $onFailed = null;

    public function add(callable $step): self
    {
        $this->steps[] = $step;
        return $this;
    }

    public function success(callable $callback): self
    {
        $this->onSuccess = $callback;
        return $this;
    }

    public function failed(callable $callback): self
    {
        $this->onFailed = $callback;
        return $this;
    }

    public function run(mixed $initialValue): WorkflowResult
    {
        $context = new WorkflowContext($initialValue);

        foreach ($this->steps as $index => $step) {

            $newContext = $step($context);

            if (!$newContext instanceof WorkflowContext) {
                $result = WorkflowResultFactory::failure(
                    $context,
                    "Step {$index} did not return a WorkflowContext",
                    $index
                );

                if ($this->onFailed) {
                    ($this->onFailed)($result);
                }

                return $result;
            }

            if ($newContext->hasError()) {
                $result = WorkflowResultFactory::failure(
                    $newContext,
                    $newContext->error,
                    $index
                );

                if ($this->onFailed) {
                    ($this->onFailed)($result);
                }

                return $result;
            }

            $context = $newContext;
        }

        $result = WorkflowResultFactory::success($context);

        if ($this->onSuccess) {
            ($this->onSuccess)($result);
        }

        return $result;
    }
}
