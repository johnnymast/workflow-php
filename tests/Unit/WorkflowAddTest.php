<?php

use JohnnyMast\LogicChain\Workflow;

it('can add arrow functions', function () {
    $workflow = (new Workflow())->add(fn ($c) => $c);
    expect($workflow)->toBeInstanceOf(Workflow::class);
});

it('can add closures', function () {
    $workflow = (new Workflow())->add(function ($c) {
        return $c;
    });
    expect($workflow)->toBeInstanceOf(Workflow::class);
});

it('can add invokable classes', function () {
    $workflow = (new Workflow())->add(new class () {
        public function __invoke($c)
        {
            return $c;
        }
    });

    expect($workflow)->toBeInstanceOf(Workflow::class);
});
