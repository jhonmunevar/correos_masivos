<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Person;

class Invitacion extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;


     protected $person;
     public $tries = 3;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Person $person)
    {
        $this->person=$person;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.plantilla_general_correo')
              //  ->from('victimas.caso001@jep.gov.co')
               // ->replyTo('claudia.erazo@jep.gov.co')
                ->subject('Caso No. 01 – Auto de apertura de trámite de traslado para la presentación de observaciones a Versiones Voluntarias')
                // ->with([
                //     'name' => $this->person->nombre1.' '.$this->person->apellido1 ,
                //     'gender' => $this->person->sexo

                // ])
                ->attach(storage_path('app/sources/Oficio_No_9227_Caso_01.pdf'), 
                    ['as'=>'Oficio No. 9227 - Caso No. 01.pdf',
                    'mime' => 'application/pdf'
                    // 'mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    
                ])

                ->attach(storage_path('app/sources/Auto_22_de_noviembre.pdf'), 
                    ['as'=>'Auto 22 de noviembre.pdf',
                    'mime' => 'application/pdf'
                    // 'mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
      
                ])


                ;
    }
}
