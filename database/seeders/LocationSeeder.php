<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {$objects = [
        ['Paris', 'Paris', 1],
        ['Nice', 'Nice', 2],
        ['Lyon', 'Lyon', 3],
        ['Marseille', 'Marseille', 4],
        ['Bordeaux', 'Bordeaux', 5],
        ['Strasbourg', 'Strasbourg', 6],
    ];

        foreach ($objects as $object) {
            $obj= new Location();
            $obj->name = $object[0];
            $obj->name_fr = $object[1];
            $obj->slug = Str::slug($object[0]);
            $obj->sort_order = $object[2];
            $obj->save();
        }
    }
}
