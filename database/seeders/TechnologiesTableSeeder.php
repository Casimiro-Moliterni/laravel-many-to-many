<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;
class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $technologies=['js','css','php','vuejs','larvel','mysql','phython'];
        foreach($technologies as $technology){
             
            $newTech = new Technology();
            $newTech->name=$technology;
            $newTech->slug=Str::slug($newTech->name, '-');
            $newTech->save();
        }
    }
}
