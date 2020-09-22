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
$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->randomElement(['Administrator', 'Author', 'Subscriber'])
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->randomElement(['PHP', 'Programming', 'Java', 'Javascript', 'Life', 'Travel', 'Food', 'Technology', 'Fashion', 'Health']),
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
        'file' => 'placeholder.jpg',
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'role_id' => $faker->numberBetween(1,3),
        'is_active' => $faker->numberBetween(0,1),
        'photo_id' => 1,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'category_id' => $faker->numberBetween(1,3),
        'photo_id' => 1,
        'title' => $faker->sentence(7, 15),
        'content' => $faker->paragraph(rand(15, 200), true),
        'slug' => $faker->slug()
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id' => $faker->numberBetween(1,10),
        'is_active' => $faker->numberBetween(0,1),
        'author' => $faker->name,
        'email' => $faker->safeEmail,
        'photo' => '/images/1552726637t8.jpg',
        'body' => $faker->paragraph(rand(15, 200), true),
    ];
});

$factory->define(App\CommentReply::class, function (Faker\Generator $faker) {
    return [
        'comment_id' => $faker->numberBetween(1,10),
        'is_active' => $faker->numberBetween(0,1),
        'author' => $faker->name,
        'email' => $faker->safeEmail,
        'photo' => '/images/1552726637t8.jpg',
        'body' => $faker->paragraph(rand(15, 200), true),
    ];
});
