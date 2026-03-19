<?php

use Johnny\Workflow\Workflow;

it('calls spies correctly on failure', function () {
    $spy = \Mockery::Mockery::spy();

    $workflow = (new Workflow())
        ->add(fn () => null)
        ->failed(fn () => $spy->called());

    $workflow->run(1);

    $spy->shouldHaveReceived('called');
});
