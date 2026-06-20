<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guarded = [];
    protected $hidden = ['password', 'remember_token'];

    public function leads() { return $this->hasMany(Lead::class); }
    public function tags() { return $this->hasMany(Tag::class); }
    public function templates() { return $this->hasMany(MessageTemplate::class); }
    public function rules() { return $this->hasMany(AutoReplyRule::class); }
    public function faqs() { return $this->hasMany(Faq::class); }
    public function conversations() { return $this->hasMany(Conversation::class); }
    public function campaigns() { return $this->hasMany(Campaign::class); }
    public function whatsappConfig() { return $this->hasOne(WhatsappConfig::class); }
}
