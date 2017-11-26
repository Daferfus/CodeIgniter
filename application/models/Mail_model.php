<?php

class Mail_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->library('email');
    }

    public function sendMail($from1, $from2, $to, $subject, $message, $attach = null, $cc = null, $bcc = null) {
        $this->email->clear(true);
        //From1 es el email que envia from2 es un alias del email
        $this->email->from($from1, $from2);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($attach!=null) $this->email->attach($attach);
        if ($cc!=null) $this->email->cc($cc);
        if ($bcc!=null) $this->email->bcc($bcc);
        if (!$this->email->send()){
            print_r($this->email);
            echo "ERROR EN EL ENVIO DEL MENSAJE";
        }
    }
}
