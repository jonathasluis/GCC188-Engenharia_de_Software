<x-app>
    <div class="d-grid gap-3">
    <div class="container row">
        <a href="{{route('produto.create')}}" class="btn btn-success col-1"><i class="fa-solid fa-plus align-middle"></i></a>
        <h2 class="col-11 text-center">Produtos</h2>
    </div>

    <table class="table table-striped table-hover text-center align-middle tabela">
        <thead>
            <tr class="cabecalho-tabela">
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Marca</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>

            @foreach($produtos as $produto)
            <tr>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->quantidade}}</td>
                <td>{{$produto->marca}}</td>
                <td>{{$produto->preco}}</td>
                <td>{{$produto->categoria}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('produto.edit',$produto->id)}}"><i class="fa-solid fa-pen"></i></a>
                </td>
                <td>
                    <form method="POST" action="{{route('produto.destroy',$produto->id)}}"  onsubmit="if(!confirm('Tem certeza que deseja remover esse produto?')){ return false;}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</x-app>