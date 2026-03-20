
[![Run Pest Tests](https://github.com/johnnymast/workflow-php/actions/workflows/tests.yml/badge.svg)](https://github.com/johnnymast/workflow-php/actions/workflows/tests.yml)

# Workflow (Work in Progress)

## Description

Workflow is built on a simple belief: complex logic shouldn’t feel complex.
This library gives you a clean, expressive way to structure multi‑step processes without drowning in conditionals, flags, or scattered service calls. Every workflow becomes a clear, linear story — one step at a time — with predictable behavior and a result you can always trust.

Whether you’re transforming data, orchestrating services, or coordinating real‑world business operations, Workflow helps you keep your code honest and your intent visible. No magic, no hidden state, no surprises. Just a lightweight pipeline that does exactly what you tell it to do.

It’s designed for developers who care about clarity.
For teams that value maintainability.
And for projects where the flow of logic matters just as much as the outcome.

If you’ve ever wished your application logic read more like a narrative and less like a maze, you’ll feel right at home here.

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


---

# Did i overengineer this class?

At first glance you might say yes! In the first local versions i just used to have the Workflow class and the sucess and failed methods.
The downside of this was that i had failed but i had no concept of what have might wrong in the workflow causing it to fail. 

If you are a backend engineer (like my self) you know how anoying errors without context can be. So i added the [WorkflowResult](src/WorkflowResult.php) and [WorkflowContext](src/WorkflowContext.php) so the there would
alway be a concept of the source (the context) and the status of the Workflow with the [WorkflowResult](src/WorkflowResult.php) that will also be passed to the failed callback.
This is how the project became a litle more technical but also more usefull in the end.

## MIT License

Copyright (c) 2026 Johnny Mast <mastjohnny@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

