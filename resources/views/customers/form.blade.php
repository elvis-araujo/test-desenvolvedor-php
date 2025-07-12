<form method="POST"
    action="{{ isset($customer) ? route('customers.update', $customer['id']) : route('customers.store') }}">
    @csrf
    @if (isset($customer))
        @method('PUT')
    @endif

    <div class="border p-3 rounded bg-white shadow-sm">
        <h6 class="text-primary fw-bold mb-3">
            {{ isset($customer) ? 'Editar Cliente' : 'Cadastro Cliente' }}
        </h6>

        <div class="row g-3 align-items-end">
            <div class="col-md-2">
                <label for="document" class="form-label">CPF:</label>
                <input type="text" name="document" id="document" class="form-control @error('sex') is-invalid @enderror"
                    value="{{ old('document', $customer['document'] ?? '') }}" placeholder="000.000.000-00">
                @error('document')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" name="name" id="name" class="form-control @error('sex') is-invalid @enderror"
                    value="{{ old('name', $customer['name'] ?? '') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <label for="birth_date" class="form-label">Data Nascimento:</label>
                <input type="date" name="birth_date" id="birth_date" class="form-control @error('sex') is-invalid @enderror"
                    value="{{ old('birth_date', $customer['birth_date'] ?? '') }}">
                @error('birth_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">Sexo:</label><br>

                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('sex') is-invalid @enderror" type="radio" name="sex"
                        value="M" {{ old('sex', $customer['sex'] ?? '') == 'M' ? 'checked' : '' }}>
                    <label class="form-check-label">Masculino</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('sex') is-invalid @enderror" type="radio" name="sex"
                        value="F" {{ old('sex', $customer['sex'] ?? '') == 'F' ? 'checked' : '' }}>
                    <label class="form-check-label">Feminino</label>
                </div>

                @error('sex')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="address" class="form-label">Endereço:</label>
                <input type="text" name="address" id="address"
                    class="form-control @error('address') is-invalid @enderror"
                    value="{{ old('address', $customer['address'] ?? '') }}">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <label for="state_id" class="form-label">Estado <span class="text-red-700">*</span>:</label>
                <select name="state_id" id="state_id" class="form-select @error('state_id') is-invalid @enderror">
                    <option value="">Selecione</option>
                </select>
                @error('state_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <label for="city_id" class="form-label">Cidade:</label>
                <select name="city_id" id="city_id" class="form-select @error('city_id') is-invalid @enderror">
                    <option value="">Selecione</option>
                </select>
                @error('city_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-12 d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary me-2">Salvar</button>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Limpar</a>
            </div>
        </div>
    </div>
</form>
@push('scripts')
    @include('components.scripts.state-city')
@endpush
