<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Juste\Facades\Mails\JusteMailer;

class MailsController extends Controller
{
    public function __construct()
    {
        $this->mustAuthenticate(false);
    }

    /**
     * Function de login
     */
    public function index()
    {
        $mail = new JusteMailer();

        $object = [
            'to' => 'kabirou2001@gmail.com',
            'subject' => 'Message d\'un potentiel client',
        ];

        $data = [
            'name' => $this->input('name', "Anonymous"),
            'email' => $this->input('email', "anonymous@anonymous.com"),
            'subject' => $this->input('subject', "Anonyme"),
            'message' => $this->input('message', "Anonyme"),
        ];

        $mail->view('mails/contact', $data)->sendEmail($object);
        return $this->back();
        // return $this->render('mailsend', $data);
    }
}
