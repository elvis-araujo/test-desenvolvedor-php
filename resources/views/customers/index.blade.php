@extends('layouts.app')

@section('title')

@section('content')
    <div>
        <img src="{{ asset('assets/logo.png') }}" alt="{{ __(':Upd8') }}" width="130px">
    </div>
    <a href="{{ route('customers.create') }}" class="btn btn-primary mt-3">Novo Cliente</a>
    @include('customers._filters') {{-- formulário de filtro --}}


    <div class="content-table-customers">
        @if (request()->hasAny(['document', 'name', 'birth_date', 'sex', 'state_id', 'city_id']))
            <h6 class="text-primary fw-bold mb-3">Resultado da Pesquisa</h6>
        @endif
        <table class="table table-bordered table-customers">
            <thead>
                <tr>
                    <th>Ações</th>
                    <th>Cliente</th>
                    <th>CPF</th>
                    <th>Data Nasc.</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Sexo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>
                            <a href="{{ route('customers.edit', $customer['id']) }}" class="btn btn-sm btn-success">Editar</a>
                            <form action="{{ route('customers.destroy', $customer['id']) }}" method="POST"
                                style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </td>
                        <td>{{ $customer['name'] }}</td>
                        <td>{{ $customer['document'] }}</td>
                        <td>{{ $customer['birth_date'] }}</td>
                        <td>{{ $customer['city']['state']['abbreviation'] }}</td>
                        <td>{{ $customer['city']['name'] }}</td>
                        <td>{{ $customer['sex'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            @if (request()->hasAny(['document', 'name', 'birth_date', 'sex', 'state_id', 'city_id']))
                                Nenhum cliente encontrado com os filtros aplicados.
                            @else
                                Você ainda não possui nenhum cliente.
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @include('components.pagination', ['links' => $links])
    </div>
@endsection
