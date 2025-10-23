<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FechaEvento extends Model
{
    use HasFactory;

    protected $table = 'fecha_evento';
    protected $primaryKey = 'id_fecha';
    public $timestamps = false;

    protected $fillable = [
        'id_evento',
        'fecha',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    /**
     * Una fecha pertenece a un evento
     */
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'id_evento', 'id_evento');
    }

    /**
     * Una fecha puede tener muchos bloques
     */
    public function bloques()
    {
        return $this->hasMany(Bloque::class, 'id_fecha', 'id_fecha');
    }
}
