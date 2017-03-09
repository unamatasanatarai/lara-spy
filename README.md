1.
====

add this to config/app providers:

```
Unamatasanatarai\LaraSpy\SpyServiceProvider::class
```

```
'aliases' => [
    ...
    'Spy' => 'Unamatasanatarai\LaraSpy\SpyFacade',
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
