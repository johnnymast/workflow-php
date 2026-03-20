<?php

use Johnny\Workflow\Workflow;
use Johnny\Workflow\WorkflowContext;
use Johnny\Workflow\WorkflowResult;

it('runs a successful workflow', function () {

    $workflow = (new Workflow())
        ->add(function (WorkflowContext $context) {
            $context->value++;
            return $context;
        })
        ->add(function (WorkflowContext $context) {
            $context->value += 2;
            return $context;
        });

    $result = $workflow->run(5);

    expect($result)->toBeInstanceOf(WorkflowResult::class);
    expect($result->didSucceed())->toBeTrue();
    expect($result->context->value)->toBe(8);
    expect($result->context->error)->toBeNull();
});
