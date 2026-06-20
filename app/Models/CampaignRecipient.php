<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CampaignRecipient extends Model
{
    protected $guarded = [];

    public function campaign() { return $this->belongsTo(Campaign::class); }
    public function lead() { return $this->belongsTo(Lead::class); }
}
