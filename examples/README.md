
# Examples

## Basic

The most minimal example showing how a workflow operates.  
A workflow is built from a sequence of steps, each receiving and returning a `WorkflowContext`.  
Every step can mutate the value or simply pass the context forward.

This example demonstrates:

- Creating a workflow  
- Adding simple mutation steps  
- Running the workflow with an initial value  
- Inspecting the final `WorkflowResult`

[Basic Example](basic.php)

---

## Failure and Success

This example shows how to inspect a `WorkflowResult` directly without using callbacks.  
It demonstrates how the engine behaves when:

- All steps succeed  
- A step returns an error via `withError()`  
- The workflow stops immediately on failure  
- You check the result using:
  - `$result->succeeded()`  
  - `$result->failed()`  
  - `$result->success`  
  - `$result->context->value`  
  - `$result->context->error`  
  - `$result->context->failedStep`

This example is the foundation for understanding how the engine handles control flow.

[Failure and Success Example](success_and_failure.php)

---

## Introducing Callbacks 

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus iaculis, mi at pretium commodo, libero mi convallis tellus, 
id volutpat lectus turpis vel turpis. Phasellus id luctus risus, in commodo mi. Phasellus tempus quis tellus sit amet malesuada. 
Donec ultrices justo sed libero blandit, ac efficitur tellus sagittis. Etiam vulputate ante id nisi volutpat cursus. 
Morbi pretium euismod laoreet. Donec elementum volutpat ante, eu tempus arcu malesuada non. Nam mauris arcu, 
ornare a rutrum vitae, rutrum vitae massa. Suspendisse viverra ex ut ipsum commodo, id aliquet nibh tincidunt. 
Quisque ac purus ac quam faucibus bibendum. Nunc a rhoncus lorem. Nulla imperdiet gravida ipsum, vitae suscipit 
libero condimentum sed. Aenean eget diam iaculis, viverra nisi vel, suscipit massa. Sed ac arcu urna.

[Introducing Callbacks Example](callbacks.php)

---

## Real World

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus iaculis, mi at pretium commodo, libero mi convallis tellus, 
id volutpat lectus turpis vel turpis. Phasellus id luctus risus, in commodo mi. Phasellus tempus quis tellus sit amet malesuada. 
Donec ultrices justo sed libero blandit, ac efficitur tellus sagittis. Etiam vulputate ante id nisi volutpat cursus. 
Morbi pretium euismod laoreet. Donec elementum volutpat ante, eu tempus arcu malesuada non. Nam mauris arcu, 
ornare a rutrum vitae, rutrum vitae massa. Suspendisse viverra ex ut ipsum commodo, id aliquet nibh tincidunt. 
Quisque ac purus ac quam faucibus bibendum. Nunc a rhoncus lorem. Nulla imperdiet gravida ipsum, vitae suscipit 
libero condimentum sed. Aenean eget diam iaculis, viverra nisi vel, suscipit massa. Sed ac arcu urna.

[Real World Example](realworld.php)

---

## Tie it down

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus iaculis, mi at pretium commodo, libero mi convallis tellus, 
id volutpat lectus turpis vel turpis. Phasellus id luctus risus, in commodo mi. Phasellus tempus quis tellus sit amet malesuada. 
Donec ultrices justo sed libero blandit, ac efficitur tellus sagittis. Etiam vulputate ante id nisi volutpat cursus. 
Morbi pretium euismod laoreet. Donec elementum volutpat ante, eu tempus arcu malesuada non. Nam mauris arcu, 
ornare a rutrum vitae, rutrum vitae massa. Suspendisse viverra ex ut ipsum commodo, id aliquet nibh tincidunt. 
Quisque ac purus ac quam faucibus bibendum. Nunc a rhoncus lorem. Nulla imperdiet gravida ipsum, vitae suscipit 
libero condimentum sed. Aenean eget diam iaculis, viverra nisi vel, suscipit massa. Sed ac arcu urna.

[Tie it down Example](typed.php)

