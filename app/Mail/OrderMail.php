<?php

namespace App\Mail;

use App\list_orders;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.listOrder')
                    ->from('lephu1890@gmail.com','Lê Văn Phú')
                    ->subject('[LVP Vietnam] Cảm ơn quý khách đã mua hàng!')
                    ->with($this->data);
    }
}
