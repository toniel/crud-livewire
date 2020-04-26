<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        //
        'nama_depan'=>$faker->firstName,
        'nama_belakang'=>$faker->lastName,
        'no_hp'=>$faker->phoneNumber,
        'email'=>$faker->safeEmail,
    ];
});
