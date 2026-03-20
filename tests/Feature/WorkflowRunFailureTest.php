<?php

use Johnny\Workflow\Workflow;
use Johnny\Workflow\WorkflowContext;
use Johnny\Workflow\WorkflowResult;

it('fails the workflow when a step returns an error', function () {

    $workflow = (new Workflow())
        ->add(function (WorkflowContext $context) {
            // eerste mutatie
            $context->value = 10;
            return $context;
        })
        ->add(function (WorkflowContext $context) {
            // hier gaat het mis
            return $context->withError("Something went wrong");
        })
        ->add(function (WorkflowContext $context) {
            // mag nooit uitgevoerd worden
            $context->value = 999;
            return $context;
        });

    $result = $workflow->run(5);

    expect($result)->toBeInstanceOf(WorkflowResult::class);

    // workflow moet falen
    expect($result->didFail())->toBeTrue();

    // error moet correct zijn
    expect($result->context->error)->toBe("Something went wrong");

    // waarde moet zijn wat het was vóór de error
    expect($result->context->value)->toBe(10);

    // failedStep moet index 1 zijn (0-based)
    expect($result->context->failedStep)->toBe(1);
});
