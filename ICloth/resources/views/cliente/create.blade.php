<x-app>
    <form method="POST" action="{{route('cliente.store')}}">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="nome" class="form-label"> Nome </label>
            <input type="text" id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror"  required maxlength="50">
            @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="cpf" class="form-label"> CPF </label>
            <input type="number" id="cpf" name="cpf" class="form-control @error('cpf') is-invalid @enderror"  required>
            @error('cpf')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label"> Telefone </label>
            <input type="number" name="telefone" id="telefone" class="form-control @error('telefone') is-invalid @enderror"  required>
            @error('telefone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label"> Endereço </label>
            <input type="text" name="endereco" id="endereco" class="form-control @error('endereco') is-invalid @enderror" required placeholder="Rua xxx,42,Bairro zzz - Cidade">
            @error('endereco')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <button class="btn btn-success" type="submit">Cadastrar</button>
        </div>

    </form>
</x-app>