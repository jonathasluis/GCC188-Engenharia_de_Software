<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = ['Camiseta','Bermuda','Boné','Short','Vestido','Calça','Camisa','Meia'];
        foreach($categorias as $categoria){
            Categoria::create([
                'nome' => $categoria
            ]);
        }
    }
}
