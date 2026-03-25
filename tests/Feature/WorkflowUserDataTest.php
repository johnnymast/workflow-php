<?php

use JohnnyMast\LogicChain\Workflow;
use JohnnyMast\LogicChain\WorkflowContext;

it('passes userData through on failure', function () {

    $workflow = (new Workflow())
        ->add(function (WorkflowContext $context) {
            return $context
                ->withError("Oops")
                ->withUserData(['foo' => 'bar']);
        });

    $result = $workflow->run("x");

    expect($result->context->userData)->toMatchArray(['foo' => 'bar']);
});
