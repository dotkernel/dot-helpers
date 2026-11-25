# Configuration

## Requirements

- **PHP**: 8.3, 8.4, 8.5, or 8.6

## Register ConfigProvider

Next, register the package's `ConfigProvider` to your application config.

```php
Dot\Helpers\ConfigProvider::class,
```

> Make sure to register the package under the `// DK packages` section.

## Container

The `ConfigProvider` registers one factory:

```php
'dependencies' => [
    'factories' => [
        Dot\Helpers\Route\RouteHelper::class => Dot\Helpers\Factory\RouteHelperFactory::class,
    ],
],
```

`RouteHelperFactory` works with any PSR-11 container that accepts a factory for each service key. The container must also supply `Mezzio\Helper\UrlHelper` and `Mezzio\Helper\ServerUrlHelper`. The `ConfigProvider` of `mezzio/mezzio-helpers` registers both.

This package does not install `laminas/laminas-servicemanager`. If your application uses Laminas Service Manager, require it in your application.

If the container returns a service of the wrong type, the factory throws `Dot\Helpers\Exception\RuntimeException`.
