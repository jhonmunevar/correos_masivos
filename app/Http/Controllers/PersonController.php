<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\Invitacion;
use App\Models\Person;
use Carbon\Carbon;
use Log;

class PersonController extends Controller
{
    
protected $sources_path;

public function __construct(){
        $this->sources_path=storage_path()."/app/sources/"; 
      
}


public function uploadPeople($sourcename){
    
    if (($handle = fopen ( $this->sources_path. $sourcename, 'r' )) !== FALSE) {
       //reads header & does nothing  with first line
        fgetcsv ( $handle, 5000, ',' ); 
        while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {

            try{

              $person = Person::create(['email' => $data[0] ]);
            
            // $person->nombre1 = strtoupper($data[1]);
            // $person->nombre2 = strtoupper($data[2]);
            // $person->apellido1 = strtoupper($data[3]);
            // $person->apellido2 = strtoupper($data[4]);
            // $person->sexo = $data[0];      
            // $person->email = $data[0];
            // $person->save ();

            //$timeDelay=Carbon::now()->addSeconds(5);

           // Mail::to($person->email)->later($timeDelay,(new Invitacion($person))->onQueue('invitaciones'));
            if(!empty($person)){
                Mail::to($person->email)
                      ->queue((new Invitacion($person))->onQueue('correosmasivos'));  

              }



            }
            catch(){

              
            }
            
            
            					         
        }
        fclose ( $handle );
     }
  }
}
