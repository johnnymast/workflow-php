<?php

use JohnnyMast\LogicChain\Workflow;
use JohnnyMast\LogicChain\WorkflowContext;
use JohnnyMast\LogicChain\WorkflowResult;

it('allows steps to mutate the context value directly', function () {

    $workflow = (new Workflow())
        ->add(function (WorkflowContext $context) {
            $context->value = 10;
            return $context;
        })
        ->add(function (WorkflowContext $context) {
            $context->value *= 2;
            return $context;
        })
        ->add(function (WorkflowContext $context) {
            $context->value += 5;
            return $context;
        });

    $result = $workflow->run(1);

    expect($result)->toBeInstanceOf(WorkflowResult::class);
    expect($result->didSucceed())->toBeTrue();
    expect($result->context->value)->toBe(25);
});

it('supports mixing mutation and withValue()', function () {

    $workflow = (new Workflow())
        ->add(function (WorkflowContext $context) {
            $context->value = 3;
            return $context;
        })
        ->add(function (WorkflowContext $context) {
            return $context->withValue($context->value * 3);
        })
        ->add(function (WorkflowContext $context) {
            $context->value += 1;
            return $context;
        });

    $result = $workflow->run(0);

    expect($result->didSucceed())->toBeTrue();
    expect($result->context->value)->toBe(10);
});

it('stops mutation when an error is returned', function () {

    $executed = 0;

    $workflow = (new Workflow())
        ->add(function (WorkflowContext $context) use (&$executed) {
            $executed++;
            $context->value = 5;
            return $context;
        })
        ->add(function (WorkflowContext $context) use (&$executed) {
            $executed++;
            return $context->withError("Mutation failed");
        })
        ->add(function (WorkflowContext $context) use (&$executed) {
            $executed++;
            $context->value = 999; // mag nooit uitgevoerd worden
            return $context;
        });

    $result = $workflow->run(0);

    expect($result->didFail())->toBeTrue();
    expect($result->context->error)->toBe("Mutation failed");
    expect($executed)->toBe(2);
    expect($result->context->value)->toBe(5);
});
