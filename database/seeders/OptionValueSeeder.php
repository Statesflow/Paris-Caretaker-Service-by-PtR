<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            ['name' => 'Floor', 'name_fr' => 'Etage', 'sort_order' => 1, 'values' => [
                ['name' => '1', 'name_fr' => '1', 'sort_order' => 1],
                ['name' => '2', 'name_fr' => '2', 'sort_order' => 2],
                ['name' => '3', 'name_fr' => '3', 'sort_order' => 3],
                ['name' => '4', 'name_fr' => '4', 'sort_order' => 4],
                ['name' => '5', 'name_fr' => '5', 'sort_order' => 5],
                ['name' => '6', 'name_fr' => '6', 'sort_order' => 6],
                ['name' => '7', 'name_fr' => '7', 'sort_order' => 7],
                ['name' => '8', 'name_fr' => '8', 'sort_order' => 8],
                ['name' => '9', 'name_fr' => '9', 'sort_order' => 9],
                ['name' => '10', 'name_fr' => '10', 'sort_order' => 10],
                ['name' => '11', 'name_fr' => '11', 'sort_order' => 11],
                ['name' => '12', 'name_fr' => '12', 'sort_order' => 12],
                ['name' => '13', 'name_fr' => '13', 'sort_order' => 13],
                ['name' => '14', 'name_fr' => '14', 'sort_order' => 14],
            ]],
            ['name' => 'Room', 'name_fr' => 'Chambre', 'sort_order' => 2, 'values' => [
                ['name' => '1', 'name_fr' => '1', 'sort_order' => 1],
                ['name' => '2', 'name_fr' => '2', 'sort_order' => 2],
                ['name' => '3', 'name_fr' => '3', 'sort_order' => 3],
                ['name' => '4', 'name_fr' => '4', 'sort_order' => 4],
                ['name' => '5', 'name_fr' => '5', 'sort_order' => 5],
                ['name' => '6', 'name_fr' => '6', 'sort_order' => 6],
                ['name' => '7', 'name_fr' => '7', 'sort_order' => 7],
                ['name' => '8', 'name_fr' => '8', 'sort_order' => 8],
                ['name' => '9', 'name_fr' => '9', 'sort_order' => 9],
                ['name' => '10', 'name_fr' => '10','sort_order' => 10],
            ]],
            ['name' => 'Bathroom', 'name_fr' => 'Salle de bain', 'sort_order' => 3, 'values' => [
                ['name' => 'no', 'name_fr' => 'non', 'sort_order' => 1],
                ['name' => '1', 'name_fr' => '1', 'sort_order' => 2],
                ['name' => '2', 'name_fr' => '2', 'sort_order' => 3],
                ['name' => '3', 'name_fr' => '3', 'sort_order' => 4],
                ['name' => '4', 'name_fr' => '4', 'sort_order' => 5],
            ]],
        ];

        foreach ($options as $option) {
            $opt = new Option();
            $opt->name = $option['name'];
            $opt->name_fr = $option['name_fr'];
            $opt->sort_order = $option['sort_order'];
            $opt->save();

            foreach ($option['values'] as $value) {
                $val = new Value();
                $val->option_id = $opt->id;
                $val->name = $value['name'];
                $val->name_fr = $value['name_fr'];
                $val->sort_order = $value['sort_order'];
                $val->save();
            }
        }
    }
}
