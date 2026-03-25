
<?php

use JohnnyMast\LogicChain\Workflow;
use JohnnyMast\LogicChain\WorkflowContext;

it('supports any value type', function () {

    $workflow = (new Workflow())
        ->add(fn (WorkflowContext $c) => $c);

    expect($workflow->run(5)->context->value)->toBe(5);
    expect($workflow->run("hello")->context->value)->toBe("hello");
    expect($workflow->run(['a' => 1])->context->value)->toBe(['a' => 1]);

    $obj = new stdClass();
    $obj->x = 10;

    expect($workflow->run($obj)->context->value)->toBe($obj);
});
