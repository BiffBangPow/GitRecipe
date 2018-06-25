# GitRecipe
A Deployer recipe for a very simple git based deployment

## Install with composer
`composer require biffbangpow/git-recipe`

## Usage
```
# deploy.php

namespace Deployer;

require 'vendor/biffbangpow/git-recipe/git-recipe.php';
```

```
$ vendor/bin/dep git:checkout --tag=1.0.0
```
OR
```
$ vendor/bin/dep git:checkout --branch=master
```
