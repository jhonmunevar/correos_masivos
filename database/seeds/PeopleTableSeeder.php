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
      $uploadDataController=new PersonController();
      //$uploadDataController->uploadPeople('destinatarios.csv');
      $uploadDataController->uploadPeople('emails_pruebas.csv');
    }
}
