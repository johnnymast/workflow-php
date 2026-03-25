<?php

namespace JohnnyMast\LogicChain;

class WorkflowResultFactory
{
    public static function success(WorkflowContext $context): WorkflowResult
    {
        return new WorkflowResult(true, $context);
    }

    public static function failure(
        WorkflowContext $context,
        string $error,
        ?int $step = null,
        array $userData = []
    ): WorkflowResult {
        $context = $context
            ->withError($error, $step)
            ->withUserData($userData);

        return new WorkflowResult(false, $context);
    }
}
