<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\PersonController;
use App\Models\Person;

class CorreosMasivos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      $filename = $this->command->ask('Nombre del archivo csv con los destinatarios');
      Person::truncate();
      $personController=new PersonController();
      $personController->uploadPeople($filename);
     
    }
}
