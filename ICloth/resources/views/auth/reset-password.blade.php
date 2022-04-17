<x-registro>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('POST')

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-3">
            <label for="email" class="form-label"> Email </label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$request->email}}" required>
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
            <label for="password_confirmation" class="form-label"> Confirme sua senha </label>
            <input type="password" id="password_confirmation" name="password_confirmation"  class="form-control @error('password_confirmation') is-invalid @enderror" required>
            @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button class="btn btn-login col-12 mb-3" type="submit">Trocar senha</button>
            
        </div>
    </form>
</x-registro>