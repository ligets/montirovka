<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'user'
        ]);
        Category::create([
            'name' => 'Обувь'
        ]);
        Category::create([
            'name' => 'Летний спорт'
        ]);
        Category::create([
            'name' => 'Одежда'
        ]);
        Category::create([
            'name' => 'Спорт инвентарь'
        ]);
        Status::create([
            'name' => 'Ожидает подтверждения'
        ]);
        Status::create([
            'name' => 'Подтвержден'
        ]);
        Status::create([
            'name' => 'Отменен'
        ]);


    }
}
