<form method="GET" id="custom-filter" action="{{ route('customers.index') }}"
    class="border border-black p-3 rounded mb-4 bg-white shadow-sm">
    <h6 class="text-primary fw-bold mb-3">Consulta Cliente</h6>

    <div class="row g-3 align-items-end">
        <div class="col-md-2">
            <label for="document" class="form-label">CPF:</label>
            <input type="text" name="document" id="document" class="form-control" value="{{ request('document') }}"
                placeholder="000.000.000-00">
        </div>

        <div class="col-md-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ request('name') }}">
        </div>

        <div class="col-md-3">
            <label for="birth_date" class="form-label">Data de Nascimento:</label>
            <input type="date" name="birth_date" id="birth_date" class="form-control"
                value="{{ request('birth_date') }}">
        </div>

        <div class="col-md-4">
            <label class="form-label">Sexo:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" value="M"
                    {{ request('sex') === 'M' ? 'checked' : '' }}>
                <label class="form-check-label">Masculino</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" value="F"
                    {{ request('sex') === 'F' ? 'checked' : '' }}>
                <label class="form-check-label">Feminino</label>
            </div>
        </div>

        <div class="col-md-3">
            <label for="state_id" class="form-label">Estado:</label>
            <select name="state_id" id="state_id" class="form-select">
                <option value="">Todos</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="city_id" class="form-label">Cidade:</label>
            <select name="city_id" id="city_id" class="form-select">
                <option value="">Todos</option>
            </select>
        </div>

        <div class="col-md-12 d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary me-2">Pesquisar</button>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Limpar</a>
        </div>
    </div>
</form>

@push('scripts')
    @include('components.scripts.state-city')
@endpush
