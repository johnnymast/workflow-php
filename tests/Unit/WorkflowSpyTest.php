<?php

use JohnnyMast\LogicChain\Workflow;
use Mockery;

it('calls spies correctly on failure', function () {
    $spy = Mockery::spy();

    $workflow = (new Workflow())
        ->add(fn () => null)
        ->failed(fn () => $spy->called());

    $workflow->run(1);

    $spy->shouldHaveReceived('called');
});
