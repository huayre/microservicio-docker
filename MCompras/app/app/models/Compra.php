<?php

namespace App\models;
use \Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable=['producto','cantidad','precio_unidad','compra_total'];
}