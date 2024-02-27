<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\NpsLink::class, function (Faker $faker) {
    return [
        'uuid' => $this->faker->email(),
        'campaign_name' => 'Vendas B2B',
        'client_name' => $this->faker->unique()->name(),
        'client_document' => preg_replace('/[^0-9]/', '', $this->faker->unique()->cpf()),
        'client_representant' => 'Sistema',
        'client_uf' => $this->faker->stateAbbr(),
        'client_city' => $this->faker->city(),
        'order_company' => 'Central Nutrition',
        'order_number' => $this->faker->randomNumber(5, 10000),
        'order_value' => $this->faker->randomFloat(5, 10, 5000),
        'order_date' => $this->faker->dateTimeBetween(now()->subYear(1), now())->format('Y-m-d H:i:s'),
        'config_process_in' => $this->faker->date(),
        'config_gateway' => 'TakeBlip',
        'config_number' => $this->faker->unique()->phoneNumber(),
        'vote' => $this->faker->randomNumber(1, 10),
        'voted_at' => $this->faker->dateTimeBetween(now()->subMonth(3), now())->format('Y-m-d H:i:s'),
    ];
});
