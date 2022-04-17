<x-app>

    <form method="POST" action="{{route('usuario.store')}}">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="name" class="form-label"> Nome </label>
            <input type="name" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$usuario->name}}" required>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="cpf" class="form-label"> CPF </label>
            <input type="number" id="cpf" name="cpf" class="form-control @error('cpf') is-invalid @enderror" value="{{$usuario->cpf}}" required>
            @error('cpf')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <button class="btn btn-login col-12 mb-3" type="submit">Salvar</button>
        </div>
    </form>


    <div class="d-grid gap-3">
        <div class="mb-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-login col-12 mb-3" type="submit">Sair</button>
            </form>
        </div>
    </div>
</x-app>