<?php

namespace JohnnyMast\LogicChain;

class WorkflowResult
{
    public function __construct(
        public bool $success,
        public WorkflowContext $context
    ) {
    }

    public function didSucceed(): bool
    {
        return $this->success === true;
    }

    public function didFail(): bool
    {
        return $this->success === false;
    }
}
