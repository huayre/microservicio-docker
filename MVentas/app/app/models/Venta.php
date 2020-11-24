<?php

namespace App\models;
use \Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable=['producto','cantidad','precio_unidad','venta_total'];
}