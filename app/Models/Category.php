<?php

namespace App\Models;
use App\Traits\HandleImageTrait;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory ,Sluggable, HandleImageTrait;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => 'true'
            ]
        ];
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
