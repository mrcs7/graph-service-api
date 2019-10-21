<?php

use Illuminate\Database\Seeder;
use App\Models\Person;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $truncate_query ='MATCH (n)
DETACH DELETE n';
        \Illuminate\Support\Facades\DB::delete($truncate_query);
        $stark = new Person(['name' => 'Tony Stark']);
        $stark->save();
        $stark->uuid = $stark->id;
        $stark->save();

        $captain = new Person(['name' => 'Steve Rogers']);
        $captain->save();
        $captain->uuid = $captain->id;
        $captain->save();


        $natashaha = new Person(['name' => 'Natasha Romanoff']);
        $natashaha->save();
        $natashaha->uuid = $natashaha->id;
        $natashaha->save();


        $hulk = new Person(['name' => 'Bruce Banner']);
        $hulk->save();
        $hulk->uuid = $hulk->id;
        $hulk->save();


        $scot = new Person(['name' => 'Scot Lang']);
        $scot->save();
        $scot->uuid = $scot->id;
        $scot->save();

        $drstrange = new Person(['name' => 'Stephen Strange']);
        $drstrange->save();
        $drstrange->uuid = $drstrange->id;
        $drstrange->save();

        $spiderman = new Person(['name' => 'Peter Parker']);
        $spiderman->save();
        $spiderman->uuid = $spiderman->id;
        $spiderman->save();

        $carter = new Person(['name' => 'Peggy Carter']);
        $carter->save();
        $carter->uuid = $carter->id;
        $carter->save();

        $thor = new Person(['name' => 'Thor Oden']);
        $thor->save();
        $thor->uuid = $thor->id;
        $thor->save();

        $stark->followers()->save($captain);
        $captain->followers()->save($natashaha);
        $natashaha->followers()->save($hulk);
        $hulk->followers()->save($scot);
        $scot->followers()->save($drstrange);
        $drstrange->followers()->save($spiderman);
        $spiderman->followers()->save($carter);
        $carter->followers()->save($thor);
        $thor->followers()->save($stark);


        $natashaha->followers()->save($thor);
        $drstrange->followers()->save($stark);
    }
}
