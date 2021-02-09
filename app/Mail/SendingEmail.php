<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendingEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $own;

    public function __construct($name, $own)
    {
        $this->name = $name;
        $this->own = $own;
    }

    // Cria o email com base em uma view
    public function build()
    {
        return $this->view('mail')
            ->subject('Teste de envio de email');
    }
}
