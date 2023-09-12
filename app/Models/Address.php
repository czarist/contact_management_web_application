<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address Extends Model
{
    protected $table = "address";

    protected $fillable = [
        'street', 'number', 'neighborhood', 'complement', 'zip_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
