<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;

    protected $table = 'signatures';

    protected $fillable = [
        'id_user',
        'receiver', // Penerima
        'subject', // Perihal
        'designation', // Tempat
        'document'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
