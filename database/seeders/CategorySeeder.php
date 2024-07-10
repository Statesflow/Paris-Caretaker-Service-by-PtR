<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {$objects = [
        ['Houses', 'Maisons', 1],
        ['Commercial estates', 'Propriétés commercial', 2],
        ['Offices', 'Bureaux', 3],
        ['Others', 'Autres', 4],
    ];

        foreach ($objects as $object) {
            $obj= new Category();
            $obj->name = $object[0];
            $obj->name_fr = $object[1];
            $obj->slug = Str::slug($object[0]);
            $obj->sort_order = $object[2];
            $obj->save();
        }
    }
}
