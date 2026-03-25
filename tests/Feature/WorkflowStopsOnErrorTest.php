<?php

use JohnnyMast\LogicChain\Workflow;
use JohnnyMast\LogicChain\WorkflowContext;

it('stops executing steps after an error', function () {

    $executed = 0;

    $workflow = (new Workflow())
        ->add(function (WorkflowContext $c) use (&$executed) {
            $executed++;
            return $c->withError("Stop");
        })
        ->add(function (WorkflowContext $c) use (&$executed) {
            $executed++;
            return $c;
        });

    $workflow->run("x");

    expect($executed)->toBe(1);
});
