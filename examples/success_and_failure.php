<?php
namespace Examples;

include __DIR__ . "/../vendor/autoload.php";

use JohnnyMast\LogicChain\Workflow;
use JohnnyMast\LogicChain\WorkflowContext;
use JohnnyMast\LogicChain\WorkflowResult;
use JohnnyMast\LogicChain\WorkflowResultFactory;

$result = (new Workflow())
    ->add(function (WorkflowContext $context) {
        $context->value++;
        return $context;
    })
    ->add(function (WorkflowContext $context) {
        $context->value += 2;
        return $context;
    })
    ->add(function (WorkflowContext $context) {

        if ($context->value != 4) {
            return $context->withError("Beep boop");
        }

        return $context;
    })
    ->failed(function (WorkflowResult $result) {
        echo "Failed\n";
        var_dump($result->context->error);
        var_dump($result->context->value);
    })
    ->success(function (WorkflowResult $result) {
        echo "Success\n";
        var_dump($result->context->value);
    })
   ->run(5)

var_dump($result);
