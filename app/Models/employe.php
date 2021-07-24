<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname', 'lastname','compani_id'
    ];
      //untuk membuat relasi tabel
      public function compani(){
        return $this->hasMany(compani::class, 'id','compani_id');
    }
     
    

  
}
