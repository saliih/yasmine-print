<?php
/**
 * Created by PhpStorm.
 * User: salah
 * Date: 13/04/2016
 * Time: 10:00
 */

namespace MailingBundle\Services;


class SendMailService
{
    protected $body;
    protected $from;
    protected $to = array();
    protected $bcc = array();
    protected $cc = array();
    protected $replay;
    protected $context;
    protected $subject;
    protected $email = null;

    public function __construct($context)
    {
        $this->context = $context;
        $this->email = \Swift_Message::newInstance();

    }

    public function setReplay($replay)
    {
        $this->replay = $replay;
    }

    public function sendMail()
    {
        $send = false;
        if ($this->subject != ""
            && $this->body != ""
            && $this->from != ""
            && count($this->to) > 0
        ) {
            $this->email->setSubject($this->subject);
            $this->email->setBody($this->body, 'text/html');
            $this->email->setFrom($this->from);
            if ($this->replay != "")
                $this->email->setReplyTo($this->replay);
            if (count($this->bcc) > 0)
                $this->email->setBcc($this->bcc);
            if (count($this->cc) > 0)
                $this->email->setCc($this->cc);
            $this->email->setTo($this->to);
            $send = ($this->context->get('mailer')->send($this->email)) ? true : false;
        }
        return $send;
    }

    /**
     * @param array $cc
     */
    public function addCc($cc, $name = "")
    {
        if ($name == "") {
            $this->cc[] = $cc;
        } else {
            $this->cc[$cc] = $name;
        }
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }


    /**
     * @param array $to
     */
    public function addTo($to, $name = "")
    {
        if ($name == "") {
            $this->to[] = $to;
        } else {
            $this->to[$to] = $name;
        }


    }


    /**
     * @param array $bcc
     */
    public function addBcc($bcc, $name)
    {
        if ($name == "") {
            $this->bcc[] = $bcc;
        } else {
            $this->bcc[$bcc] = $name;
        }

    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = 'norepley@yasminepress.com';
    }
}