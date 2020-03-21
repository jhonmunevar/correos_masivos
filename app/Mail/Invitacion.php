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
                ->subject('Autos acreditación y traslado')
                // ->with([
                //     'name' => $this->person->nombre1.' '.$this->person->apellido1 ,
                //     'gender' => $this->person->sexo

                // ])
                ->attach(storage_path('app/sources/auto_19_marzo.pdf'), 
                    ['as'=>'auto_19_marzo.pdf',
                     'mime' => 'application/pdf'
                     // 'mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    
                ])
                ->attach(storage_path('app/sources/auto_17_marzo_suspende.pdf'), 
                    ['as'=>'auto_17_marzo_suspende.pdf',
                     'mime' => 'application/pdf'
                     // 'mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    
                ])

                // ->attach(storage_path('app/sources/Auto_22_de_noviembre.pdf'), 
                //     ['as'=>'Auto 22 de noviembre.pdf',
                //     'mime' => 'application/pdf'
                //     // 'mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
      
                // ])


                ;
    }
}
