<x-app>
    <form method="POST" action="{{route('produto.update',$produto->id)}}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="nome" class="form-label"> Nome </label>
            <input type="text" id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{$produto->nome}}" required maxlength="20">
            @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="quantidade" class="form-label"> Quantidade </label>
            <input type="number" id="quantidade" name="quantidade" class="form-control @error('quantidade') is-invalid @enderror" value="{{$produto->quantidade}}" required>
            @error('quantidade')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="marca" class="form-label"> Marca </label>
            <input type="text" name="marca" id="marca" class="form-control @error('marca') is-invalid @enderror" value="{{$produto->marca}}" required>
            @error('marca')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label"> Preço </label>
            <input type="number" step="0.01" name="preco" id="preco" class="form-control @error('preco') is-invalid @enderror" value="{{$produto->preco}}" maxlength="80" required>
            @error('preco')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label"> Categoria </label>
            <select name="categoria" id="categoria" class="form-select @error('categoria') is-invalid @enderror" required>
                @foreach($categorias as $categoria)
                    @if($categoria->id == $produto->categoria_id)
                        <option value="{{$categoria->id}}" selected>
                            {{$categoria->nome}}
                        </option>
                    @else
                        <option value="{{$categoria->id}}">
                            {{$categoria->nome}}
                        </option>
                    @endif
                @endforeach
            </select>
                @error('categoria')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>     
        <div class="form-group">
            <button class="btn btn-success" type="submit">Salvar</button>
        </div>
    </form>
</x-app>