<?php

use Johnny\Workflow\Workflow;

$workflow = new Workflow();

test('add returns instance of Workflow', function () {
    $workflow = new Workflow();

    $result = $workflow->add(fn() => null);

    expect($result)->toBeInstanceOf(Workflow::class);
});
