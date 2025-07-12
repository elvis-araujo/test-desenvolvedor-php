@if (!empty($links))
    <nav class="custom-pagination-container">
        <ul class="pagination custom-pagination justify-content-center">
            @foreach ($links as $link)
                @php
                    // Tradução dos rótulos
                    $label = $link['label'];
                    if ($label === '&laquo; Previous') $label = '← Anterior';
                    if ($label === 'Next &raquo;') $label = 'Próximo →';

                    // Reescreve o link para a rota da web (ex: /customers?page=2&name=joao)
                    $url = $link['url'];
                    if ($url) {
                        $parsed = parse_url($url);
                        parse_str($parsed['query'] ?? '', $params);
                        $params = array_merge(request()->except('page'), ['page' => $params['page'] ?? 1]);
                        $localUrl = request()->url() . '?' . http_build_query($params);
                    } else {
                        $localUrl = '#';
                    }
                @endphp

                <li class="page-item {{ $link['active'] ? 'active' : '' }} {{ is_null($link['url']) ? 'disabled' : '' }}">
                    @if ($link['url'])
                        <a class="page-link" href="{{ $localUrl }}">{!! $label !!}</a>
                    @else
                        <span class="page-link">{!! $label !!}</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
@endif
