<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MessageTemplate extends Model
{
    protected $guarded = [];
    protected $casts = ['variables' => 'array'];

    public function user() { return $this->belongsTo(User::class); }
    public function campaigns() { return $this->hasMany(Campaign::class); }
    public function rules() { return $this->hasMany(AutoReplyRule::class); }
}
