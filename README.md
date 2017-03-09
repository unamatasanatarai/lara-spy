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
"require": {
    "unamatasanatarai/lara-spy": "dev-master"
},
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/unamatasanatarai/lara-spy.git"
    }
],
```
