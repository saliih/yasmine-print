<?php

namespace MailingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cfgmailing
 *
 * @ORM\Table(name="cfgmailing")
 * @ORM\Entity(repositoryClass="MailingBundle\Repository\cfgmailingRepository")
 */
class cfgmailing
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="waits", type="integer")
     */
    private $waits;

    /**
     * @var int
     *
     * @ORM\Column(name="numberbywait", type="integer")
     */
    private $numberbywait;

    /**
     * @var string
     *
     * @ORM\Column(name="sender", type="string", length=255)
     */
    private $sender;
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="replayemail", type="string", length=255)
     */
    private $replayemail;


    public function __toString()
    {
        return $this->title;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set waits
     *
     * @param integer $waits
     * @return cfgmailing
     */
    public function setWaits($waits)
    {
        $this->waits = $waits;

        return $this;
    }

    /**
     * Get waits
     *
     * @return integer 
     */
    public function getWaits()
    {
        return $this->waits;
    }

    /**
     * Set numberbywait
     *
     * @param integer $numberbywait
     * @return cfgmailing
     */
    public function setNumberbywait($numberbywait)
    {
        $this->numberbywait = $numberbywait;

        return $this;
    }

    /**
     * Get numberbywait
     *
     * @return integer 
     */
    public function getNumberbywait()
    {
        return $this->numberbywait;
    }

    /**
     * Set sender
     *
     * @param string $sender
     * @return cfgmailing
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return string 
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return cfgmailing
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set replayemail
     *
     * @param string $replayemail
     * @return cfgmailing
     */
    public function setReplayemail($replayemail)
    {
        $this->replayemail = $replayemail;

        return $this;
    }

    /**
     * Get replayemail
     *
     * @return string 
     */
    public function getReplayemail()
    {
        return $this->replayemail;
    }
}
