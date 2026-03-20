
[![Run Pest Tests](https://github.com/johnnymast/workflow-php/actions/workflows/tests.yml/badge.svg)](https://github.com/johnnymast/workflow-php/actions/workflows/tests.yml)

# workflow-php (Work in Progress)

## Description

Workflow is built on a simple belief: complex logic shouldn’t feel complex.
This library gives you a clean, expressive way to structure multi‑step processes without drowning in conditionals, flags, or scattered service calls. Every workflow becomes a clear, linear story — one step at a time — with predictable behavior and a result you can always trust.

Whether you’re transforming data, orchestrating services, or coordinating real‑world business operations, Workflow helps you keep your code honest and your intent visible. No magic, no hidden state, no surprises. Just a lightweight pipeline that does exactly what you tell it to do.

It’s designed for developers who care about clarity.
For teams that value maintainability.
And for projects where the flow of logic matters just as much as the outcome.

If you’ve ever wished your application logic read more like a narrative and less like a maze, you’ll feel right at home here.

---

## Why Workflow Matters To You

One of the biggest advantages of this library only becomes visible when you use it in a real production codebase.  
Large features that once required hundreds or even thousands of lines of orchestration logic can now be expressed as a simple, readable pipeline:

```php
$workflow = (new Workflow())
    ->add(new ValidateOrder())
    ->add(new CreateOrder())
    ->add(new StoreOrder())
    ->add(new SendOrderEmail())
    ->success(fn($r) => print "Order completed\n")
    ->failed(fn($r) => print "Order failed: {$r->context->error}\n");

$result = $workflow->run([
    'customer' => 'john@example.com',
    'items' => ['sku-123', 'sku-456'],
]);
```

That’s the entire flow — end to end.  
No scattered service calls, no deeply nested conditionals, no hidden state.  
Just a clean sequence of steps that tells the story of what your application is doing.

### A smaller codebase, by design  
When every step becomes an invokable class, your business logic naturally breaks down into small, focused units.  
You stop writing glue code.  
You stop repeating yourself.  
You stop threading state through half a dozen services.

The workflow becomes the place where everything comes together, and the steps become the place where everything stays clear.

### Turning features on and off becomes trivial  
Need to disable a step temporarily?

```php
// ->add(new CheckFraud())
```

Need to replace a step with a new implementation?

```php
->add(new NewFraudCheck())
```

Need to insert a step in the middle of the pipeline?

```php
->addBefore(StoreOrder::class, new ApplyDiscounts())
```

You don’t have to refactor existing logic.  
You don’t have to hunt through controllers or services.  
You don’t have to worry about breaking unrelated parts of the system.

The workflow is the single source of truth for the process.

### Production code becomes predictable  
Every workflow:

- starts with a clear input  
- moves through a linear sequence of steps  
- stops immediately on failure  
- returns a `WorkflowResult` you can always trust  

That predictability is what makes large systems maintainable.  
It’s what keeps teams aligned.  
And it’s what turns complex business flows into something you can reason about at a glance.

### A workflow engine that earns its place  
This library isn’t about clever abstractions.  
It’s about reducing friction.  
It’s about making large features feel small again.  
It’s about giving you a structure that scales with your project instead of fighting it.

If you’ve ever looked at a feature and thought, “This should be simpler than it is,”  
Workflow gives you the tools to make that true.

---

 - You might want to add a simple thing where you can debug the reason of failure.

# Did i overengineer this class?

At first glance you might say yes! In the first local versions i just used to have the Workflow class and the sucess and failed methods.
The downside of this was that i had failed but i had no concept of what have might wrong in the workflow causing it to fail. 

If you are a backend engineer (like my self) you know how anoying errors without context can be. So i added the [WorkflowResult](src/WorkflowResult.php) and [WorkflowContext](src/WorkflowContext.php) so the there would
alway be a concept of the source (the context) and the status of the Workflow with the [WorkflowResult](src/WorkflowResult.php) that will also be passed to the failed callback.
This is how the project became a litle more technical but also more usefull in the end.

## Todo examples

- [ ] Add a real world scenario and also use this for documentation.
- [ ] Extend Workflow and closely lock down types

## Basic

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus iaculis, mi at pretium commodo, libero mi convallis tellus, 
id volutpat lectus turpis vel turpis. Phasellus id luctus risus, in commodo mi. Phasellus tempus quis tellus sit amet malesuada. 
Donec ultrices justo sed libero blandit, ac efficitur tellus sagittis. Etiam vulputate ante id nisi volutpat cursus. 
Morbi pretium euismod laoreet. Donec elementum volutpat ante, eu tempus arcu malesuada non. Nam mauris arcu, 
ornare a rutrum vitae, rutrum vitae massa. Suspendisse viverra ex ut ipsum commodo, id aliquet nibh tincidunt. 
Quisque ac purus ac quam faucibus bibendum. Nunc a rhoncus lorem. Nulla imperdiet gravida ipsum, vitae suscipit 
libero condimentum sed. Aenean eget diam iaculis, viverra nisi vel, suscipit massa. Sed ac arcu urna.

[Basic Examle](basic.php)

MIT License

Copyright (c) 2026 Johnny Mast <mastjohnny@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

