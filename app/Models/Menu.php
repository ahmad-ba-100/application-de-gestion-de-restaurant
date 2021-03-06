<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable=["titre","slug","description","image","prix","category_id"];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function getRouteKeyName()
    {
        return"slug";
    }
    public function sales(){
        return $this->belongsToMany(Sales::class);
    }
}
