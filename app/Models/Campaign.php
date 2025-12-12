<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','slug','short_description','description','image',
        'target_amount','collected_amount','end_date','category_id','status'
    ];

    protected static function booted()
    {
        static::creating(function ($campaign) {
            if (empty($campaign->slug)) {
                $campaign->slug = Str::slug($campaign->title) . '-' . Str::random(6);
            }
        });
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // helper: total donation (fresh from relation)
    public function refreshCollected()
    {
        $sum = $this->donations()->where('status','success')->sum('amount');
        $this->collected_amount = $sum;
        $this->save();
        return $sum;
    }
}
