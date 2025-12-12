<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','priority'];

    protected static function booted()
    {
        static::creating(function ($c) {
            if (empty($c->slug)) {
                $c->slug = Str::slug($c->name).'-'.Str::random(4);
            }
        });
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
