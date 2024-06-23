<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $table = "employers";


    public function tags()
    {
        return $this->hasMany(JobModel::class);
    }
}
