<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
    'name' => $faker->name,
    'email' => $faker->email,
    'password' => bcrypt('password'),
    'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\User::class, 'me', function (Faker\Generator $faker) {
    return [
    'name' => 'Soli',
    'email' => 'soli@email.com',
    'password' => bcrypt('password'),
    'remember_token' => str_random(10),
    ];
});

$factory->define(App\Consumer::class, function (Faker\Generator $faker) {
    return [
    'name' => $faker->name,
    'email' => $faker->email,
    'password' => bcrypt(123),
    'key_id' => $faker->numberBetween($min = 1, $max = 1000000),
    'betrag' => $faker->numberBetween($min = -50, $max = 100),
    ];
});

$factory->define(App\Transaction::class, function (Faker\Generator $faker) {
    return [
    'user_id' => $faker->numberBetween($min = 1, $max = 5),
    'consumer_id' => $faker->numberBetween($min = 1, $max = 50),
    'amount' => $faker->numberBetween($min = 1, $max = 10),
    'booking_number' => $faker->uuid(),
    'note' => $faker->word,
    ];
});

$factory->define(App\RegisterTransaction::class, function (Faker\Generator $faker) {
    return [
    'sender_id' => $faker->numberBetween($min = 1, $max = 5),
    'reciever_id' => $faker->numberBetween($min = 1, $max = 5),
    'amount' => $faker->numberBetween($min = 10, $max = 100),
    'booking_number' => $faker->uuid(),
    'note' => $faker->word,
    ];
});

$factory->define(App\Payment::class, function (Faker\Generator $faker) {
    return [
    'user_id' => $faker->numberBetween($min = 1, $max = 5),
    'product_id' => $faker->numberBetween($min = 1 ,$max = 3),
    'amount' => $faker->numberBetween($min = 1, $max = 10),
    'booking_number' => $faker->uuid(),
    'note' => $faker->word,
    ];
});


$factory->define(App\Order::class, function (Faker\Generator $faker) {
    $price = $faker->randomElement($array = array ('0.5','0.3','0.8'));
    $quantity = $faker->numberBetween($min = 1, $max =3);
    $cost = $price * $quantity;
    return [
    'product_id' => $faker->numberBetween($min = 1, $max = 3),
    'consumer_id' => $faker->numberBetween($min = 1, $max = 50),
    'cost' => $cost,
    'quantity' => $quantity,
    ];
});

$factory->defineAs(App\Product::class, 'coffee', function ($faker) {
    return [
        'name' => 'Coffee',
        'price' => 0.3,
        'photo'=> 'coffee.png',
        'quantity'=> 50,
        'register' => 0,
    ];
});

$factory->defineAs(App\Product::class, 'lemonade', function ($faker) {
    return [
        'name' => 'Lemonade',
        'price' => 0.8,
        'photo'=> 'softdrink.png',
        'quantity'=> 50,
        'register' => 0,
    ];
});
 
$factory->defineAs(App\Product::class, 'water', function ($faker) {
    return [
        'name' => 'Water',
        'price' => 0.5,
        'photo'=> 'water.png',
        'quantity'=> 50,
        'register' => 0,
    ];
});
 




