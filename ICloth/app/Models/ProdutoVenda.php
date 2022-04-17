<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoVenda extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['quantidade','venda_id','produto_id'];

    public function venda(){
        return $this->belongsTo(Venda::class);
    }

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
