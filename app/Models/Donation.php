<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id','invoice','amount','donor_name','donor_email',
        'message','payment_method','status'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
