<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use App\Mail\Solicitud;
//use App\Models\Person;
use Carbon\Carbon;
use Log;

class SolicitudController extends Controller
{
 
 	protected $sources_path;
 	protected $send_to;

	public function __construct(){
	        $this->sources_path=storage_path()."/app/sources/"; 
	        $this->send_to='humberto.zuluaga@jep.gov.co';
	      
	}


	public function enviarSolicitudes($sourcename){
	    
	    if (($handle = fopen ( $this->sources_path.$sourcename, 'r' )) !== FALSE) {
	        fgetcsv ( $handle, 5000, ';' ); //reads header do nothing
	        while ( ($data = fgetcsv ( $handle, 5000, ';' )) !== FALSE ) {
	            
	            $files=Storage::disk('repositorio')->files($data[0]);
	            $datos['codigo']=$data[1]; 
				$datos['files']=$files;

				//new Solicitud($datos);

	           // Mail::to($person->email)->later($timeDelay,(new Invitacion($person))->onQueue('invitaciones'));
	            Mail::to($this->send_to)->queue((new Solicitud($datos))->onQueue('correosmasivos'));						         
	        }
	        fclose ( $handle );
	    }
	}
}
