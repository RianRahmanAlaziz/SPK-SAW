<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subkriteria()
    {
        return $this->hasOne(Subkriteria::class);
    }
    public function proseshitung()
    {
        return $this->hasMany(ProsesHitung::class);
    }
}
