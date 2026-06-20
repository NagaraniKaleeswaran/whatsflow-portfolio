<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $guarded = [];
    protected $casts = ['stats' => 'array', 'scheduled_at' => 'datetime'];

    public function user() { return $this->belongsTo(User::class); }
    public function template() { return $this->belongsTo(MessageTemplate::class, 'message_template_id'); }
    public function recipients() { return $this->hasMany(CampaignRecipient::class); }
}
