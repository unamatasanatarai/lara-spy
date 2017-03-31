1. That's nice
====

add this to config/app providers:

```
Unamatasanatarai\LaraSpy\SpyServiceProvider::class
```

```
'aliases' => [
    ...
    'Spy' => Unamatasanatarai\LaraSpy\SpyFacade::class,
];
```

```php
php artisan vendor:publish --provider="Unamatasanatarai\LaraSpy\SpyServiceProvider"
```

```
\Spy::log('Opened a page', 'homes');
```
https://packagist.org/packages/unamatasanatarai/lara-spy
