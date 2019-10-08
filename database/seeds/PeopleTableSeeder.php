<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\PersonController;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $personController=new PersonController();
      $personController->uploadPeople('destinatarios.csv');
     
    }
}
