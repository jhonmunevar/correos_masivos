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
     public $tries = 5;

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
        return $this->markdown('emails.invitacion_acreditacion_victimas')
                ->from('victimas.caso001@jep.gov.co')
                ->replyTo('info@jep.gov.co')
                ->replyTo('victimas.caso001@jep.gov.co')
                ->subject('Invitación para ser reconocido/a como víctima ante la JEP en el Caso No. 001 denominado “Retención ilegal de personas por parte de las FARC-EP"')
                ->with([
                    'name' => $this->person->nombre1.' '.$this->person->apellido1 ,
                    'gender' => $this->person->sexo

                ])
                ->attach(storage_path('app/sources/FORMATO_ACREDITACION_VICTIMAS.pdf'), 
                    ['as'=>'solicitud_de_acreditacion_como_victima_jep_caso001.pdf',
                    'mime' => 'application/pdf',
                ]);;
    }
}
