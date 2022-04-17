<x-registro>

    <form method="POST" action="{{route('register')}}">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="name" class="form-label"> Nome </label>
            <input type="name" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label"> Email </label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" required>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label"> CPF </label>
            <input type="number" id="cpf" name="cpf" class="form-control @error('cpf') is-invalid @enderror" value="{{old('cpf')}}" required>
            @error('cpf')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label"> Senha </label>
            <input type="password" id="password" name="password"  class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="password_confirmation" class="form-label"> Confirme sua senha </label>
            <input type="password" id="password_confirmation" name="password_confirmation"  class="form-control @error('password_confirmation') is-invalid @enderror" required>
            @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button class="btn btn-login col-12 mb-3" type="submit">Registrar</button>
        </div>
    </form>
</x-registro>