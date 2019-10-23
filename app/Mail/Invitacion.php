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
        return $this->markdown('emails.poder_representacion_judicial')
              //  ->from('victimas.caso001@jep.gov.co')
                ->replyTo('claudia.erazo@jep.gov.co')
                ->subject('Poder para representación judicial por el “Sistema Autónomo de Asesoría y Defensa – Representación a víctimas”')
                // ->with([
                //     'name' => $this->person->nombre1.' '.$this->person->apellido1 ,
                //     'gender' => $this->person->sexo

                // ])
                ->attach(storage_path('app/sources/Poder_para_representacion_judicial.docx'), 
                    ['as'=>'Poder_para_representacion_judicial.docx',
                    //'mime' => 'application/pdf',
                    'mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',

                    
                ]);;
    }
}
