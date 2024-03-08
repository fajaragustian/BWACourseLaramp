<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class Camp extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    protected $fillable = ['title', 'price', 'image', 'slug', 'desc'];
    // Jika user sebut sudah terdafatar pada kelas tersebut maka tidak bisa kembali
    public function getIsRegisteredAttribute()
    {
        if (!Auth::check()) {
            return false;
        }
        return Checkout::whereCampId($this->id)->whereUserId(Auth::id())->exists();
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }
}
