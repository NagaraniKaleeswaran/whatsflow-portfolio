<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function user() { return $this->belongsTo(User::class); }
    public function leads() { return $this->belongsToMany(Lead::class); }
}
