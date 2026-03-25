
<?php

use JohnnyMast\LogicChain\Workflow;
use JohnnyMast\LogicChain\WorkflowContext;

it('executes the success callback', function () {

    $called = false;

    $workflow = (new Workflow())
        ->add(fn (WorkflowContext $c) => $c)
        ->success(function () use (&$called) {
            $called = true;
        });

    $workflow->run("ok");

    expect($called)->toBeTrue();
});

it('executes the failed callback', function () {

    $called = false;

    $workflow = (new Workflow())
        ->add(fn (WorkflowContext $c) => $c->withError("Nope"))
        ->failed(function () use (&$called) {
            $called = true;
        });

    $workflow->run("start");

    expect($called)->toBeTrue();
});
