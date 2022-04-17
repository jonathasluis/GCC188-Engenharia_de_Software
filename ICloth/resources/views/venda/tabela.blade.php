<x-app>
<div class="d-grid gap-3">
    <div class="container row">
        <a href="{{route('venda.create')}}" class="btn btn-success col-1"><i class="fa-solid fa-plus align-middle"></i></a>
        <h2 class="col-11 text-center">Vendas</h2>
    </div>

    <table class="table table-striped table-hover text-center align-middle tabela">
        <thead>
            <tr class="cabecalho-tabela">
                <th>Cliente</th>
                <th>Quantidade de produtos</th>
                <th>Valor</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $venda)
            <tr>
                <td>{{$venda->cliente->nome}}</td>
                <td>
                @php
                $quantidade = 0;
                foreach($venda->produtos as $produto){
                    $quantidade += $produto->quantidade;
                }
                @endphp
                {{$quantidade}}
                </td>
                <td>{{sprintf('R$ %.2f', $venda->valor)}}</td>          
                <td>
                    <a class="btn btn-primary" href="{{route('venda.edit',$venda->id)}}"><i class="fa-solid fa-pen"></i></a>
                </td>
                <td>
                    <form method="POST" action="{{route('venda.destroy',$venda->id)}}"  onsubmit="if(!confirm('Tem certeza que deseja remover essa venda?')){ return false;}">
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