<?php

namespace JohnnyMast\LogicChain;

class WorkflowContext
{
    public function __construct(
        public mixed $value,
        public ?string $error = null,
        public ?int $failedStep = null,
        public array $userData = []
    ) {
    }

    public function withValue(mixed $newValue): self
    {
        $clone = clone $this;
        $clone->value = $newValue;
        return $clone;
    }

    public function withError(string $message, ?int $step = null): self
    {
        $clone = clone $this;
        $clone->error = $message;
        $clone->failedStep = $step;
        return $clone;
    }

    public function withUserData(array $data): self
    {
        $clone = clone $this;
        $clone->userData = array_merge($clone->userData, $data);
        return $clone;
    }

    public function hasError(): bool
    {
        return $this->error !== null;
    }
}
