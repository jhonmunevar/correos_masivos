<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Solicitud extends Mailable
{
    use Queueable, SerializesModels;

     protected $datos;
     public $tries = 5;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos)
    {
        $this->datos=$datos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message= $this->markdown('emails.solicitud_acreditacion_victimas')
                ->from('victimas.caso001@jep.gov.co')
                ->replyTo('victimas.caso001@jep.gov.co')
                ->subject('Solicitud de acreditación como víctima del Caso 01 ante la JEP -'.$this->datos['codigo'].' : '.$this->datos['nombre'])
                ->with([
                    'datos' => $this->datos
                ]);

                foreach ($this->datos['files'] as $file) {
                    $message->attachFromStorageDisk('repositorio', $file);
                }
               
           return  $message;   
    }
}
