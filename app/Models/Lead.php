<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $guarded = [];

    public function user() { return $this->belongsTo(User::class); }
    public function tags() { return $this->belongsToMany(Tag::class); }
    public function conversations() { return $this->hasMany(Conversation::class); }
    public function campaignRecipients() { return $this->hasMany(CampaignRecipient::class); }
}
