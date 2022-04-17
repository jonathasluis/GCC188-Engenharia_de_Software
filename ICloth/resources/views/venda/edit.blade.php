<x-app>
    @if($errors->any())
    <h4 class="alert alert-danger">{{$errors->first()}}</h4>
    @endif

    <form method="POST" action="{{route('venda.update',$venda->id)}}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="data" class="form-label"> data </label>
            <input type="date" id="data" name="data" class="form-control @error('data') is-invalid @enderror" value="{{$venda->data}}" required>
            @error('data')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cliente" class="form-label"> Cliente </label>
            <select name="cliente" id="cliente" class="form-select @error('cliente') is-invalid @enderror" required>
                @foreach($clientes as $cliente)
                @if( $venda->cliente_id == $cliente->id )
                <option value="{{$cliente->id}}" selected>
                    {{$cliente->nome}}
                </option>
                @else
                <option value="{{$cliente->id}}">
                    {{$cliente->nome}}
                </option>
                @endif
                @endforeach
            </select>
            @error('cliente')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="button" onclick="adicionarProduto()" class="btn btn-success col-1"><i class="fa-solid fa-plus align-middle"></i></button>
            <table class="table table-striped table-hover text-center align-middle tabela">
                <thead>
                    <tr class="cabecalho-tabela">
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody id="produtos">
                    @foreach($produtosVenda as $produtoVenda)
                    <tr>
                        <td>
                            <select name="produto[]" class="form-select" required>
                                @foreach($produtos as $produto)
                                @if($produto->id == $produtoVenda->produto_id)
                                <option value="{{$produto->id}}" selected>
                                    {{$produto->nome}}
                                </option>
                                @else
                                <option value="{{$produto->id}}">
                                    {{$produto->nome}}
                                </option>
                                @endif

                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" step="1" name="quantidade[]" class="form-control" value="{{$produtoVenda->quantidade}}" required>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="removerProduto(this)" type="button"><i class="fa-solid fa-trash"></i></button>
                        </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit">Salvar</button>
        </div>

    </form>
    <div class="invisivel">
        <table>
            <tr id="produto">
                <td>
                    <select name="produto[]" class="form-select" required>
                        @foreach($produtos as $produto)
                        <option value="{{$produto->id}}">
                            {{$produto->nome}}
                        </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" step="1" name="quantidade[]" class="form-control" required>
                </td>
                <td>
                    <button class="btn btn-danger" onclick="removerProduto(this)" type="button"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        </table>
    </div>
</x-app>

<script src="{{ asset('js/venda.js') }}"></script>