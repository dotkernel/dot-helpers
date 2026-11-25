# Upgrading from 3.x to 4.0

Read this table before you update `dotkernel/dot-helpers` to 4.0.

| Change | Symptom | Fix |
| --- | --- | --- |
| PHP 8.2 is not supported | Composer does not install 4.0 on PHP 8.2 | Use PHP 8.3 or later |
| `laminas/laminas-servicemanager` is not installed with this package | `Class "Laminas\ServiceManager\ServiceManager" not found` in an application that did not require it | Run `composer require laminas/laminas-servicemanager`, or use a different PSR-11 container |
| `appendQueryParam()` encodes the value one time, with `%20` for a space | Code that decodes the value two times gets a wrong value. Tests that compare the old string fail | Decode the value one time. Update the expected strings |
| `appendQueryParam()` keeps the other parameters as they are | Names with `.` or a space are no longer changed to `_`. A query `0` is kept | Read the parameter by its real name |
| `RouteHelperFactory` checks the service types | `Dot\Helpers\Exception\RuntimeException` instead of `TypeError` when the container returns a wrong type. The container can wrap it in its own exception | Register `UrlHelper` and `ServerUrlHelper` correctly. Catch the new exception if necessary |
| Minimum versions | Composer installs `mezzio/mezzio-helpers` 5.21 or later and `laminas/laminas-diactoros` 3.10 or later | Update these packages in the application |

## appendQueryParam() output

The same call returns a different query in 4.0:

| Query | Name | Value | 3.x | 4.0 |
| --- | --- | --- | --- | --- |
| empty | `q` | `a b` | `q=a%2Bb` | `q=a%20b` |
| empty | `q` | `x&y=z` | `q=x%2526y%253Dz` | `q=x%26y%3Dz` |
| `a.b=1&c%20d=2` | `q` | `v` | `a_b=1&c_d=2&q=v` | `a.b=1&c%20d=2&q=v` |
| `0` | `q` | `v` | `q=v` | `0&q=v` |
| `q=old&r=1` | `q` | `new` | `q=new&r=1` | `q=new&r=1` |

In 3.x, `parse_str()` gives back `a+b` for the value `a b`. In 4.0, it gives back `a b`.
