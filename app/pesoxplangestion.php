<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class pesoxplangestion extends Model
{
    use Notifiable;

    protected $fillable = [
        'id', 'detalle', 'peso','token',
    ];

    protected $table = 'pesoxplangestion';
}
