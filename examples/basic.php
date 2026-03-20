<?php

include __DIR__ . "/../vendor/autoload.php";

use Johnny\Workflow\Workflow;
use Johnny\Workflow\WorkflowContext;

$workflow = (new Workflow())
    ->add(function (WorkflowContext $context) {
        $context->value++;
        return $context;
    })
    ->add(function (WorkflowContext $context) {
        $context->value *= 2;
        return $context;
    })
    ->add(function (WorkflowContext $context) {
        $context->value -= 3;
        return $context;
    });

$result = $workflow->run(5);

var_dump($result);
