<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AutoReplyRule extends Model
{
    protected $guarded = [];

    public function user() { return $this->belongsTo(User::class); }
    public function template() { return $this->belongsTo(MessageTemplate::class, 'message_template_id'); }
}
