<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['valor','cliente_id','user_id','data'];

    public function produtos(){
        return $this->hasMany(ProdutoVenda::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

}
