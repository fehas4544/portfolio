<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education'; // Laravel usually expects plural, but 'education' is already plural-ish or can be confused. Migration used 'education'.

    protected $fillable = [
        'institution',
        'degree',
        'duration',
    ];
}
