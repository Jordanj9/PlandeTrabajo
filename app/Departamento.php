<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nombre', 'descripcion', 'facultad_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function facultad()
    {
        return $this->belongsTo(Facultad::class);
    }

    public function programas()
    {
        return $this->hasMany(Programa::class);
    }

    public function docentes()
    {
        return $this->hasMany(Docente::class);
    }
}
