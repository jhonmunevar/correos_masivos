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
                ->subject('Ampliación plazo - Presentación de observaciones a las versiones voluntarias Caso 01 (JEP)')
                // ->with([
                //     'name' => $this->person->nombre1.' '.$this->person->apellido1 ,
                //     'gender' => $this->person->sexo

                // ])
                ->attach(storage_path('app/sources/auto_5_marzo_2020.pdf'), 
                    ['as'=>'auto_5_marzo_2020.pdf',
                     'mime' => 'application/pdf'
                     // 'mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    
                ])
                // ->attach(storage_path('app/sources/120203620006143_auto.pdf'), 
                    // ['as'=>'120203620006143_auto.pdf',
                     // 'mime' => 'application/pdf'
                     // 'mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    
                // ])

                // ->attach(storage_path('app/sources/Auto_22_de_noviembre.pdf'), 
                //     ['as'=>'Auto 22 de noviembre.pdf',
                //     'mime' => 'application/pdf'
                //     // 'mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
      
                // ])


                ;
    }
}
