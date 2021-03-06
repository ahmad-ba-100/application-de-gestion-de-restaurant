<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = ["nom", "status", "slug"];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function sales()
    {
        return $this->belongsToMany(Sales::class);
    }
}
