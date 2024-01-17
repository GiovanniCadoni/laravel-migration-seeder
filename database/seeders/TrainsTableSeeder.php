<?php

namespace Database\Seeders;

use App\Models\Train;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $azienda = ['Trenitalia', 'Italo', 'Trenord', 'Ferrovienord', 'RailOne'];
        $stazioni = ['Roma', 'Milano', 'Bologna', 'Torino', 'Firenze', 'Napoli', 'Pisa', 'Bari'];
        for($i = 0; $i < 50; $i++) {
            $train = new Train();
            $train->azienda = $faker->randomElement($azienda);
            $train->stazione_partenza = $faker->randomElement($stazioni);
            do {
                $train->stazione_arrivo = $faker->randomElement($stazioni);
            } while ($train->stazione_partenza === $train->stazione_arrivo);
            
            $train->orario_partenza = $faker->dateTimeBetween('-1 day', '+1 day');

            $carbon_partenza = new Carbon($train->orario_partenza);
            $train->orario_arrivo = $carbon_partenza->addHours($faker->numberBetween(1, 24))->format('Y-m-d H:i:s');

            $train->codice = $faker->bothify('??###');
            $train->numero_carrozze = $faker->numberBetween(1, 15);
            $train->puntuale = $faker->boolean();
            $train->cancellato =$faker->boolean();

            $train->save();
        }
    }
}
