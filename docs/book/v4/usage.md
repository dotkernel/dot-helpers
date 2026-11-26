# Usage

Get `Dot\Helpers\Route\RouteHelper` from the container and inject it in your class.

The examples below use a route named `user.view` with the path `/user/{id}`. The current request URI is `https://example.com`.

## Generate a URI

`generateUri()` returns a `Psr\Http\Message\UriInterface`. All keys of the array are optional.

| Key | Type | Description |
| --- | --- | --- |
| `route_name` | `non-empty-string` or `null` | The route name. `null` uses the matched route |
| `route_params` | `array<string, mixed>` | The values of the route parameters |
| `query_params` | `array<string, mixed>` | The query parameters |
| `fragment_id` | `string` or `null` | The fragment, without `#` |
| `options` | `array` | The options of `Mezzio\Helper\UrlHelper::generate()` |

```php
$uri = $routeHelper->generateUri([
    'route_name'   => 'user.view',
    'route_params' => ['id' => '5'],
    'query_params' => ['tab' => 'orders'],
    'fragment_id'  => 'latest',
]);
// /user/5?tab=orders#latest
```

Set the second argument to `true` to get an absolute URI:

```php
$uri = $routeHelper->generateUri(['route_name' => 'user.view', 'route_params' => ['id' => '5']], true);
// https://example.com/user/5
```

> The absolute URI uses the URI that `Mezzio\Helper\ServerUrlHelper` has. In a Mezzio application, `Mezzio\Helper\ServerUrlMiddleware` sets it.

## Compare two URIs

`uriEquals()` compares the scheme, the host, the port and the path. It ignores the query, the fragment and the user info.

```php
$same = $routeHelper->uriEquals(
    new Uri('https://example.com/user/5?tab=orders'),
    new Uri('https://example.com/user/5')
);
// true
```

## Add a query parameter

`appendQueryParam()` adds the parameter to the end of the query. The value is encoded one time, as RFC 3986 specifies.

```php
$uri = $routeHelper->appendQueryParam(new Uri('https://example.com/search?page=2'), 'q', 'red shoes');
// https://example.com/search?page=2&q=red%20shoes
```

If the query has a parameter with the same name, the method replaces the first one in its position and removes the others. The other parameters stay unchanged.

```php
$uri = $routeHelper->appendQueryParam(new Uri('https://example.com/search?page=2&q=old'), 'page', '3');
// https://example.com/search?page=3&q=old
```

In these examples, `Uri` is `Laminas\Diactoros\Uri`. Any `Psr\Http\Message\UriInterface` implementation works.
