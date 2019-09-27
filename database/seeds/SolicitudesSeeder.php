<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\SolicitudController;

class SolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $solicitudController=new SolicitudController();
      $solicitudController->enviarSolicitudes('acreditacion_victimas.test');
    }
}
