<x-registro>

    <form method="POST" action="{{route('login')}}">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="email" class="form-label"> Email </label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" required>
            @error('email')
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
            <button class="btn btn-login col-12 mb-3" type="submit">Logar</button>
            <a class="btn btn-login col-12" href="{{route('register')}}"> Registrar </a>
        </div>
    </form>
</x-registro>