<?php

namespace Database\Seeders;

use App\Models\ClientsGuitars;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientsGuitarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClientsGuitars::factory(5)->create();
    }
}
