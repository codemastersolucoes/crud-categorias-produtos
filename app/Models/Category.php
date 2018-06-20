<?php
declare(strict_types=1);

namespace WhatsShop\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class Category extends Model
{
    use SoftDeletes, Sluggable;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['name', 'description', 'slug'];

    protected static function boot()
    {
        parent::boot();
        self::creating(/**
         * @param $model
         */
            function ($model) {
                $model->{$model->getKeyName()} = (string)Uuid::generate(4);
            }
        );
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
