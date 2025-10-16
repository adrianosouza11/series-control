<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="name" class="form-label">Nome:</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}" autofocus>
            </div>

            <div class="col-2">
                <label for="seasonQty" class="form-label">Nº Temporadas:</label>
                <input
                    type="text"
                    id="seasonQty"
                    name="seasonQty"
                    class="form-control"
                    value="{{ old('seasonQty') }}">
            </div>

            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps / Temporada:</label>
                <input
                    type="text"
                    id="episodesPerSeason"
                    name="episodesPerSeason"
                    class="form-control"
                    value="{{ old('episodesPerSeason') }}">
            </div>
        </div>



        <button class="btn btn-primary" type="submit">Adicionar</button>
    </form>

</x-layout>
