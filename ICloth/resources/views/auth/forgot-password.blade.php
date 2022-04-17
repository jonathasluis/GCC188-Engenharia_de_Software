<x-registro>

    <form method="POST" action="{{route('password.email')}}">
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
            <button class="btn btn-login col-12 mb-3" type="submit">Enviar validação</button>
        </div>

    </form>
</x-registro>