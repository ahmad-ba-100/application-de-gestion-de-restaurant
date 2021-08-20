<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $fillable=["servant_id","quantite","prix_total","total_reçu","reste","type_paiement","status_payment"];

    public function menus()
    {
       return  $this->belongsToMany(Menu::class);

    }
    public function tables()
    {
       return $this->belongsToMany(Table::class);
    }
    public function serveurs()
    {
        return $this->belongsTo(Serveurs::class,'servant_id');
    }


}
