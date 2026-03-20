
<?php

use Johnny\Workflow\Workflow;
use Johnny\Workflow\WorkflowContext;
use Johnny\Workflow\WorkflowResult;

it('fails when a step returns an error', function () {

    $workflow = (new Workflow())
        ->add(function (WorkflowContext $context) {
            $context->value++;
            return $context;
        })
        ->add(function (WorkflowContext $context) {
            return $context->withError("Boom!");
        });

    $result = $workflow->run(5);

    expect($result->didFail())->toBeTrue();
    expect($result->context->error)->toBe("Boom!");
    expect($result->context->failedStep)->toBe(1);
});
