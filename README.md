# laravel-possible-composite-key
PHP trait to use composite keys in your Laravel Eloquent models and does not fail on possible missing column.

## Installation:
```ssh
composer require rvzug/laravel-possible-composite-key
```

## Usage:
```php
<?php

use Rvzug\CanHasCompositeKey;
use Illuminate\Database\Eloquent\Model;

class MyModel extend Model {
    use CanHasCompositeKey;
    
    protected $primaryKey = ['one', 'two', 'three'];
    public $incrementing = false;
    
}
```

In your migrations / database it's now possible to add Nullable to 'one', 'two', 'three'. Assuming that at least one of the other is filled with a near-unique value. For example an ArticleCode or Gtin value.
In my usages I use keys: 'ArticleCode', 'EanCode', 'Supplier', where code and ean could be empty. The combination of Supplier and one of the codes is reasonably unique.
