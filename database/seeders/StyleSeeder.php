<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Style;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $csvFile = fopen(base_path('database/data/styles.csv'), 'r');

       $firstline = true;
       while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
           if (!$firstline) {
               Style::create([
                   "name" => $data['2']
               ]);    
           }
           $firstline = false;
       }
  
       fclose($csvFile);
    }
}
