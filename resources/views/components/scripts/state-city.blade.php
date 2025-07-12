<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stateSelect = document.getElementById('state_id');
        const citySelect = document.getElementById('city_id');

        if (!stateSelect || !citySelect) return;

        const selectedState = '{{ request('state_id', $customer['city']['state_id'] ?? '') }}';
        const selectedCity = '{{ request('city_id', $customer['city_id'] ?? '') }}';

        // Carrega estados
        fetch('/api/states')
            .then(res => res.json())
            .then(states => {
                states.forEach(state => {
                    const option = new Option(state.name + ' (' + state.abbreviation + ')', state
                        .id);
                    if (state.id == selectedState) option.selected = true;
                    stateSelect.add(option);
                });

                if (selectedState) {
                    stateSelect.dispatchEvent(new Event('change'));
                }
            });

        // Quando muda o estado, carrega as cidades
        stateSelect.addEventListener('change', function() {
            const stateId = this.value;
            citySelect.innerHTML = '<option value="">Carregando cidades...</option>';

            if (!stateId) {
                citySelect.innerHTML = '<option value="">Selecione uma cidade</option>';
                return;
            }

            fetch(`/api/cities?state_id=${stateId}`)
                .then(res => res.json())
                .then(cities => {
                    citySelect.innerHTML = '<option value="">Selecione uma cidade</option>';
                    cities.forEach(city => {
                        const option = new Option(city.name, city.id);
                        if (city.id == selectedCity) option.selected = true;
                        citySelect.add(option);
                    });
                });
        });
    });
</script>
