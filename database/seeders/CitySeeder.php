<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $state = State::where("abbreviation", "AC")->first();
        if ($state) {
            City::create(["name" => "Rio Branco", "state_id" => $state->id]);
            City::create(["name" => "Cruzeiro do Sul", "state_id" => $state->id]);
            City::create(["name" => "Sena Madureira", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "AL")->first();
        if ($state) {
            City::create(["name" => "Maceió", "state_id" => $state->id]);
            City::create(["name" => "Arapiraca", "state_id" => $state->id]);
            City::create(["name" => "Palmeira dos Índios", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "AM")->first();
        if ($state) {
            City::create(["name" => "Manaus", "state_id" => $state->id]);
            City::create(["name" => "Parintins", "state_id" => $state->id]);
            City::create(["name" => "Itacoatiara", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "AP")->first();
        if ($state) {
            City::create(["name" => "Macapá", "state_id" => $state->id]);
            City::create(["name" => "Santana", "state_id" => $state->id]);
            City::create(["name" => "Laranjal do Jari", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "BA")->first();
        if ($state) {
            City::create(["name" => "Salvador", "state_id" => $state->id]);
            City::create(["name" => "Feira de Santana", "state_id" => $state->id]);
            City::create(["name" => "Vitória da Conquista", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "CE")->first();
        if ($state) {
            City::create(["name" => "Fortaleza", "state_id" => $state->id]);
            City::create(["name" => "Caucaia", "state_id" => $state->id]);
            City::create(["name" => "Juazeiro do Norte", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "DF")->first();
        if ($state) {
            City::create(["name" => "Brasília", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "ES")->first();
        if ($state) {
            City::create(["name" => "Vitória", "state_id" => $state->id]);
            City::create(["name" => "Vila Velha", "state_id" => $state->id]);
            City::create(["name" => "Serra", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "GO")->first();
        if ($state) {
            City::create(["name" => "Goiânia", "state_id" => $state->id]);
            City::create(["name" => "Aparecida de Goiânia", "state_id" => $state->id]);
            City::create(["name" => "Anápolis", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "MA")->first();
        if ($state) {
            City::create(["name" => "São Luís", "state_id" => $state->id]);
            City::create(["name" => "Imperatriz", "state_id" => $state->id]);
            City::create(["name" => "Caxias", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "MG")->first();
        if ($state) {
            City::create(["name" => "Belo Horizonte", "state_id" => $state->id]);
            City::create(["name" => "Uberlândia", "state_id" => $state->id]);
            City::create(["name" => "Contagem", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "MS")->first();
        if ($state) {
            City::create(["name" => "Campo Grande", "state_id" => $state->id]);
            City::create(["name" => "Dourados", "state_id" => $state->id]);
            City::create(["name" => "Três Lagoas", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "MT")->first();
        if ($state) {
            City::create(["name" => "Cuiabá", "state_id" => $state->id]);
            City::create(["name" => "Várzea Grande", "state_id" => $state->id]);
            City::create(["name" => "Rondonópolis", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "PA")->first();
        if ($state) {
            City::create(["name" => "Belém", "state_id" => $state->id]);
            City::create(["name" => "Ananindeua", "state_id" => $state->id]);
            City::create(["name" => "Santarém", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "PB")->first();
        if ($state) {
            City::create(["name" => "João Pessoa", "state_id" => $state->id]);
            City::create(["name" => "Campina Grande", "state_id" => $state->id]);
            City::create(["name" => "Santa Rita", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "PE")->first();
        if ($state) {
            City::create(["name" => "Recife", "state_id" => $state->id]);
            City::create(["name" => "Jaboatão dos Guararapes", "state_id" => $state->id]);
            City::create(["name" => "Olinda", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "PI")->first();
        if ($state) {
            City::create(["name" => "Teresina", "state_id" => $state->id]);
            City::create(["name" => "Parnaíba", "state_id" => $state->id]);
            City::create(["name" => "Picos", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "PR")->first();
        if ($state) {
            City::create(["name" => "Curitiba", "state_id" => $state->id]);
            City::create(["name" => "Londrina", "state_id" => $state->id]);
            City::create(["name" => "Maringá", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "RJ")->first();
        if ($state) {
            City::create(["name" => "Rio de Janeiro", "state_id" => $state->id]);
            City::create(["name" => "Niterói", "state_id" => $state->id]);
            City::create(["name" => "Duque de Caxias", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "RN")->first();
        if ($state) {
            City::create(["name" => "Natal", "state_id" => $state->id]);
            City::create(["name" => "Mossoró", "state_id" => $state->id]);
            City::create(["name" => "Parnamirim", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "RO")->first();
        if ($state) {
            City::create(["name" => "Porto Velho", "state_id" => $state->id]);
            City::create(["name" => "Ji-Paraná", "state_id" => $state->id]);
            City::create(["name" => "Ariquemes", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "RR")->first();
        if ($state) {
            City::create(["name" => "Boa Vista", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "RS")->first();
        if ($state) {
            City::create(["name" => "Porto Alegre", "state_id" => $state->id]);
            City::create(["name" => "Caxias do Sul", "state_id" => $state->id]);
            City::create(["name" => "Pelotas", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "SC")->first();
        if ($state) {
            City::create(["name" => "Florianópolis", "state_id" => $state->id]);
            City::create(["name" => "Joinville", "state_id" => $state->id]);
            City::create(["name" => "Blumenau", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "SE")->first();
        if ($state) {
            City::create(["name" => "Aracaju", "state_id" => $state->id]);
            City::create(["name" => "Nossa Senhora do Socorro", "state_id" => $state->id]);
            City::create(["name" => "Lagarto", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "SP")->first();
        if ($state) {
            City::create(["name" => "São Paulo", "state_id" => $state->id]);
            City::create(["name" => "Campinas", "state_id" => $state->id]);
            City::create(["name" => "São Bernardo do Campo", "state_id" => $state->id]);
        }

        $state = State::where("abbreviation", "TO")->first();
        if ($state) {
            City::create(["name" => "Palmas", "state_id" => $state->id]);
            City::create(["name" => "Araguaína", "state_id" => $state->id]);
            City::create(["name" => "Gurupi", "state_id" => $state->id]);
        }

    }
}
