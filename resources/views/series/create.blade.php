<x-layout title="Nova Série">
    <form action="/series/store" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <button class="btn btn-primary" type="submit">Adicionar</button>
    </form>
</x-layout>
