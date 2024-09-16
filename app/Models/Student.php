<?php

namespace App\Models;

use App\Common\Models\Concerns\CommonQueries;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use CommonQueries, HasFactory;

    protected $fillable = [
        'name',
        'email',
    ];
}
