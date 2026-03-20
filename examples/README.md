
# Examples

## Basic

The most minimal example showing how a workflow operates.  
A workflow is built from a sequence of steps, each receiving and returning a **WorkflowContext**.  
Every step can mutate the value or simply pass the context forward.

This example demonstrates:

- Creating a workflow  
- Adding simple mutation steps  
- Running the workflow with an initial value  
- Inspecting the final **WorkflowResult**

[Basic Example](basic.php)

---

## Failure and Success

This example shows how to inspect a **WorkflowResult** directly without using callbacks.  
It demonstrates how the engine behaves when:

- All steps succeed  
- A step returns an error via **withError()**  
- The workflow stops immediately on failure  
- You check the result using:
  - **$result->succeeded()**  
  - **$result->failed()**  
  - **$result->success**  
  - **$result->context->value**  
  - **$result->context->error**  
  - **$result->context->failedStep**

This example is the foundation for understanding how the engine handles control flow.

[Failure and Success Example](success_and_failure.php)

---


## Introducing Callbacks

Callbacks allow you to react to the final outcome of a workflow without mixing side‑effects into your workflow steps.

A workflow can register two types of callbacks:

- **success(Closure)** — executed only when the workflow completes successfully  
- **failed(Closure)** — executed only when a step returns an error

Callbacks are optional helpers.  
They do **not** replace the **WorkflowResult** object.  
You always receive a result and can still inspect it manually:

- **$result->didSucceed()**  
- **$result->didFail()**  
- **$result->success**  
- **$result->context->value**  
- **$result->context->error**  
- **$result->context->failedStep**

This makes callbacks ideal for logging, notifications, or cleanup logic, while keeping your workflow steps pure and focused.

[Introducing Callbacks Example](callbacks.php)

---


## Real World

This example demonstrates how a workflow can coordinate multiple services in a realistic scenario.  
The workflow simulates a simple order‑processing pipeline:

1. Validate the incoming order data  
2. Create the order  
3. Store it in a repository  
4. Send a confirmation email  

All supporting classes live in **examples/Misc/** and contain placeholder methods to keep the example focused on workflow orchestration rather than implementation details.

Even in a real‑world workflow, you still receive a **WorkflowResult** object and can inspect:

- **$result->didSucceed()**  
- **$result->didFail()**  
- **$result->context->value**  
- **$result->context->error**  
- **$result->context->failedStep**  

This example shows how workflows can act as clean, predictable pipelines for multi‑step business logic.

[Real World Example](realworld.php)

