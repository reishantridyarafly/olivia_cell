<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $guarded = [];

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function items()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
