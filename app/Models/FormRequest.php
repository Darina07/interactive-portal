<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormRequest extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'email', 'note', 'user_id', 'status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
