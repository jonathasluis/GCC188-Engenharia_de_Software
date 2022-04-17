<x-app>
    <form method="POST" action="{{route('produto.store')}}">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="nome" class="form-label"> Nome </label>
            <input type="text" id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror"  value="{{old('nome')}}" required maxlength="20">
            @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="quantidade" class="form-label"> Quantidade </label>
            <input type="number" step="0.01" id="quantidade" name="quantidade"  value="{{old('quantidade')}}" class="form-control @error('quantidade') is-invalid @enderror"  required>
            @error('quantidade')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="marca" class="form-label"> Marca </label>
            <input type="text" name="marca" id="marca" class="form-control @error('marca') is-invalid @enderror" value="{{old('marca')}}" required maxlength="20"> 
            @error('marca')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label"> Preço </label>
            <input type="number" name="preco" step='0.01' id="preco" class="form-control @error('preco') is-invalid @enderror" value="{{old('preco')}}" required>
            @error('preco')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label"> Categoria </label>
            <select name="categoria" id="categoria" class="form-select @error('categoria') is-invalid @enderror" required>
                @foreach($categorias as $categoria)
                    @if($categoria->id == old('categoria'))
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
            <button class="btn btn-success" type="submit">Cadastrar</button>
        </div>
    </form>
</x-app>