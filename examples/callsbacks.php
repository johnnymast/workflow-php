<?php

namespace Examples;

require __DIR__ . "/../vendor/autoload.php";

use JohnnyMast\LogicChain\Workflow;
use JohnnyMast\LogicChain\WorkflowContext;
use JohnnyMast\LogicChain\WorkflowResult;

/**
 * -----------------------------------------------------------------------------
 *  callbacks.php
 * -----------------------------------------------------------------------------
 *
 *  This example demonstrates how to use the `success()` and `failed()` callbacks.
 *
 *  A workflow can register:
 *
 *      • success(Closure)  – runs only when the workflow succeeds
 *      • failed(Closure)   – runs only when the workflow fails
 *
 *  Important:
 *      You ALWAYS receive a WorkflowResult object.
 *      Callbacks do NOT replace the result.
 *
 *  You can still inspect the result manually:
 *
 *      $result->didSucceed()
 *      $result->didFail()
 *      $result->success
 *      $result->context->value
 *      $result->context->error
 *      $result->context->failedStep
 *
 * -----------------------------------------------------------------------------
 */

echo "================ SUCCESS CALLBACK ================\n";

$workflow = (new Workflow())
    ->add(fn (WorkflowContext $c) => $c->withValue($c->value + 1))
    ->add(fn (WorkflowContext $c) => $c->withValue($c->value * 2))
    ->success(function (WorkflowResult $result) {
        echo "Workflow succeeded with value: {$result->context->value}\n";
    })
    ->failed(function (WorkflowResult $result) {
        echo "This should not run in the success example.\n";
    });

$result = $workflow->run(10);

var_dump([
    'didSucceed()' => $result->didSucceed(),
    'didFail()'    => $result->didFail(),
    'value'        => $result->context->value,
    'error'        => $result->context->error,
]);


echo "\n================ FAILURE CALLBACK ================\n";

$workflowFail = (new Workflow())
    ->add(fn (WorkflowContext $c) => $c->withValue($c->value + 1))
    ->add(fn (WorkflowContext $c) => $c->withError("Something went wrong"))
    ->success(function (WorkflowResult $result) {
        echo "This should not run in the failure example.\n";
    })
    ->failed(function (WorkflowResult $result) {
        echo "Workflow failed: {$result->context->error}\n";
    });

$resultFail = $workflowFail->run(5);

var_dump([
    'didSucceed()' => $resultFail->didSucceed(),
    'didFail()'    => $resultFail->didFail(),
    'value'        => $resultFail->context->value,
    'error'        => $resultFail->context->error,
    'failedStep'   => $resultFail->context->failedStep,
]);
