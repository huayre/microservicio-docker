<?php
namespace App\models;
use \Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
   protected $fillable=['nombre','stock'];
}