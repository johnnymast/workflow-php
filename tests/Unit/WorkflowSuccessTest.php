<?php

use JohnnyMast\LogicChain\Workflow;
use JohnnyMast\LogicChain\WorkflowContext;
use JohnnyMast\LogicChain\WorkflowResult;

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
