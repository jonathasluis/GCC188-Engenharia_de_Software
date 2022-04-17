<x-app>
    <div class="d-grid gap-3">
        <div class="mb-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-login col-12 mb-3" type="submit">Sair</button>
            </form>
        </div>
    </div>
</x-app>