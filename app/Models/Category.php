<?php

namespace App\Models;

use App\Models\Annonce;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

        //une categorie peut avoir plusieurs annonces
        public function annonces(): HasMany
        {
           return $this->hasMany(Annonce::class);
        }
    
}
