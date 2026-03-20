<?php

use Johnny\Workflow\Workflow;
use Johnny\Workflow\WorkflowContext;
use Johnny\Workflow\WorkflowResult;

it('runs a workflow successfully and returns the final value', function () {

    $workflow = (new Workflow())
        ->add(function (WorkflowContext $context) {
            $context->value++;
            return $context;
        })
        ->add(function (WorkflowContext $context) {
            $context->value *= 2;
            return $context;
        })
        ->add(function (WorkflowContext $context) {
            $context->value += 3;
            return $context;
        });

    $result = $workflow->run(5);

    expect($result)->toBeInstanceOf(WorkflowResult::class);
    expect($result->didSucceed())->toBeTrue();
    expect($result->context->value)->toBe(((5 + 1) * 2) + 3);
    expect($result->context->error)->toBeNull();
});
