# Annotated Container and Phpactor

A small, proof-of-concept showing a core concept behind Annotated Container... Bring Your Own Container!

This implementation is meant to show that autowiring is not required to use Annotated Container and can be integrated with whatever style of dependency injection you prefer.

This demo requires to install dev branches from Annotated Container and from a forked Phpactor:

- The [Phpactor fork](https://github.com/cspray/phpactor-container) only makes changes to allow psr/container:2. The changes are made in the `task/allow-psr-container-2` branch
- Annotated Container requires pulling from `dev-main` to allow overriding `ContainerFactory` implementations. This will be released properly as part of v2.1.

## Running Demo

You should clone this repo and then run composer install.

```
git clone git@github.com:cspray/annotated-container-phpactor.git
cd annotated-container-phpactor && composer install
```

After that, from the repo's root directory you can run the demo script:

```
php app.php
```

If everything runs correctly you should see output similar to the following:

```
class Cspray\AnnotatedContainerPhpactor\Widget#652 (1) {
  public readonly string $id =>
  string(32) "Annotated Container and Phpactor"
}
```

Please check out the rest of this codebase for more details!