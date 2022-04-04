<x-app>
    <div class="d-grid gap-3">
    <div class="container row">
        <a href="{{route('cliente.create')}}" class="btn btn-success col-1"><i class="fa-solid fa-plus align-middle"></i></a>
        <h2 class="col-11 text-center">Clientes</h2>
    </div>

    <table class="table table-striped table-hover text-center align-middle tabela">
        <thead>
            <tr class="cabecalho-tabela">
                <th>Nome</th>
                <th>Telefone</th>
                <th>CPF</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>

            @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->telefone}}</td>
                <td>{{$cliente->cpf}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('cliente.edit',$cliente->id)}}"><i class="fa-solid fa-pen"></i></a>
                </td>
                <td>
                    <form method="POST" action="{{route('cliente.destroy',$cliente->id)}}">
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