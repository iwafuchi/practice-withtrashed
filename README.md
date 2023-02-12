# lemp-based
プロジェクトを作成  
composer create-project --prefer-dist "laravel/laravel=9.*" .  
権限の付与  
chmod -R 777 storage bootstrap/cache

## アクセサの追加 Eloquent用の設定
$appendsで属性を追加する  
get[属性名]Attribute()で追加する処理を作成する  
JSONやtoArray()した結果に自動的に含まれる
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model {
    use HasFactory, SoftDeletes;

    protected $appends = [
        'random_id'
    ];


    public function user() {
        return $this->belongsTo(User::class, 'random_id');
    }

    public function getRandomIdAttribute() {
        return rand(0, 99999);
    }
}

```