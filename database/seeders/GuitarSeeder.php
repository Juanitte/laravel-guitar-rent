<?php

namespace Database\Seeders;

use App\Models\Guitar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuitarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guitar1 = new Guitar();

        $guitar1->model = 'Stratocaster';
        $guitar1->brand = 'Fender';
        $guitar1->year = '1967';
        $guitar1->image = 'images/stratocaster.jpg';
        $guitar1->price = 1000;
        $guitar1->description = 'Stratocaster';


        $guitar1->save();

        $guitar2 = new Guitar();

        $guitar2->model = 'SG';
        $guitar2->brand = 'Gibson';
        $guitar2->year = '2008';
        $guitar2->image = 'images/sg.jpg';
        $guitar2->price = 1000;
        $guitar2->description = 'SG';


        $guitar2->save();

        $guitar3 = new Guitar();

        $guitar3->model = 'Flying V';
        $guitar3->brand = 'Gibson';
        $guitar3->year = '2002';
        $guitar3->image = 'images/flyingv.jpg';
        $guitar3->price = 1000;
        $guitar3->description = 'Flying V';


        $guitar3->save();
    }
}
