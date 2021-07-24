<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class compani extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'logo'
    ];

  

    public function getPicturePathAttribute(){
        return url('') . Storage::url($this->attributes['logo']);
    }
}
