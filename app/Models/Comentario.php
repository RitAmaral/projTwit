<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; //import model of user

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'tb_comentarios';
    protected $primaryKey = 'id_comentarios';
    public $timestamps = false;

    protected $fillable = [
        'comentario',
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}

