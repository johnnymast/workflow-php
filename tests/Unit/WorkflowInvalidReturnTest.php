<?php

use JohnnyMast\LogicChain\Workflow;
use JohnnyMast\LogicChain\WorkflowContext;

it('fails when a step does not return a WorkflowContext', function () {

    $workflow = (new Workflow())
        ->add(fn () => 123); // fout type

    $result = $workflow->run("start");

    expect($result->didFail())->toBeTrue();
    expect($result->context->error)->toContain("did not return a WorkflowContext");
});
