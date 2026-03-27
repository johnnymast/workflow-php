[![Run Pest Tests](https://github.com/johnnymast/workflow-php/actions/workflows/tests.yml/badge.svg)](https://github.com/johnnymast/workflow-php/actions/workflows/tests.yml)
[![License](https://img.shields.io/badge/License-Apache_2.0-pink.svg)](https://www.apache.org/licenses/LICENSE-2.0)

# LogicChain (Work in Progress)

- [x] Check examples
- [x] Double check tests
- [x] Double check documentation and code examples
- [x] Comment code where needed 
- [x] Comment examples and add output
- [ ] Check donation pages
- [x] Check badges

### Articles

- [ ] Check documentation for twitter / linked in
- [ ] Check promotion image


### Before live

- [ ] Add package to packagist
- [ ] Check donation pages
- [ ] Check if there is a correct tag
- [ ] Double check if there are open isuses.
- [ ] Check links in docs


### After live 

- [ ] Merge branch into master

Workflow is built on a simple belief: complex logic shouldn’t feel complex.
This library gives you a clean, expressive way to structure multi‑step processes without drowning in conditionals, flags, or scattered service calls. Every workflow becomes a clear, linear story — one step at a time — with predictable behavior and a result you can always trust.

Whether you’re transforming data, orchestrating services, or coordinating real‑world business operations, Workflow helps you keep your code honest and your intent visible. No magic, no hidden state, no surprises. Just a lightweight pipeline that does exactly what you tell it to do.

It’s designed for developers who care about clarity.
For teams that value maintainability.
And for projects where the flow of logic matters just as much as the outcome.

If you’ve ever wished your application logic read more like a narrative and less like a maze, you’ll feel right at home here.

Large features that once required hundreds or even thousands of lines of orchestration logic can now be expressed as a simple, readable pipeline:

```php
use JohnnyMast\LogicChain\Workflow;

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

## Installation 

Install LogicChain via Composer:

```bash
composer require johnnymast/logichain
```

After installation, all classes are available under the namespace:

```php
JohnnyMast\LogicChain
```

---

## Examples & Use Cases

LogicChain includes a collection of practical examples that demonstrate how to build and structure chains for different scenarios.  
If you want to explore real‑world use cases or see how to apply the library in your own projects, check the `examples/` directory in the project root.

The examples show:

- how to build a simple chain  
- how to pass context between steps  
- how to handle success and failure callbacks  
- how to structure reusable step classes  
- how to orchestrate multi‑step business logic  

Exploring the examples is the quickest way to understand how LogicChain works in real applications.

---

## Apache 2.0 License

LogicChain is licensed under the Apache License, Version 2.0 (Apache-2.0).

© 2026 Johnny Mast — mastjohnny@gmail.com  
You may use this project in commercial and private applications under the terms of the Apache 2.0 license.

See the full license in the `LICENSE.md` file.
Additional project notices can be found in the `NOTICE` file.
