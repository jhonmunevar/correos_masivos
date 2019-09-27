<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use App\Mail\Solicitud;
use Carbon\Carbon;
use Log;

class SolicitudController extends Controller
{
 
 	protected $sources_path;
 	protected $send_to;

	public function __construct(){
	        $this->sources_path=storage_path()."/app/sources/"; 
	       // $this->send_to='info@jep.gov.co';
	        $this->send_to='humberto.zuluaga@jep.gov.co';
	      
	      
	}


	public function enviarSolicitudes($sourcename){
	    
	    if (($handle = fopen ( $this->sources_path.$sourcename, 'r' )) !== FALSE) {
	        fgetcsv ( $handle, 5000, ';' ); //reads header do nothing
	        while ( ($data = fgetcsv ( $handle, 5000, ';' )) !== FALSE ) {
	            
	            $files=Storage::disk('repositorio')->files($data[4]);
	            $datos['codigo']=$data[6];
	            $datos['nombre']=$data[0].' '.$data[1].' '.$data[2].' '.$data[3];  
	            $datos['cedula']=$data[4];
	            $datos['email']=$data[5];
				$datos['files']=$files;


				//Log::info($files);

	            Mail::to($this->send_to)->queue((new Solicitud($datos))->onQueue('correosmasivos'));						         
	        }
	        fclose ( $handle );
	    }
	}
}
