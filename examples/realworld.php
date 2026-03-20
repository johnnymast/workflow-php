
<?php

require __DIR__ . "/../vendor/autoload.php";

use Johnny\Workflow\Workflow;
use Johnny\Workflow\WorkflowResult;
use Examples\Invokables\ValidateOrder;
use Examples\Invokables\CreateOrder;
use Examples\Invokables\StoreOrder;
use Examples\Invokables\SendOrderEmail;

/**
 * -----------------------------------------------------------------------------
 *  realworld.php
 * -----------------------------------------------------------------------------
 *
 *  A realistic example showing how a workflow can orchestrate multiple steps
 *  using invokable classes. Each step is clean, testable, and self-contained.
 *
 *  The pipeline:
 *
 *      1. Validate the incoming order data
 *      2. Create the order
 *      3. Store the order
 *      4. Send a confirmation email
 *
 *  All step classes live in examples/Invokables/.
 *
 * -----------------------------------------------------------------------------
 */

$workflow = (new Workflow())
    ->add(new ValidateOrder())
    ->add(new CreateOrder())
    ->add(new StoreOrder())
    ->add(new SendOrderEmail())
    ->success(function (WorkflowResult $result) {
        echo "Order workflow completed successfully.\n";
    })
    ->failed(function (WorkflowResult $result) {
        echo "Order workflow failed: {$result->context->error}\n";
    });

$result = $workflow->run([
    'customer' => 'john@example.com',
    'items' => ['sku-123', 'sku-456'],
]);

var_dump([
    'didSucceed()' => $result->didSucceed(),
    'didFail()'    => $result->didFail(),
    'value'        => $result->context->value,
    'error'        => $result->context->error,
    'failedStep'   => $result->context->failedStep,
]);
