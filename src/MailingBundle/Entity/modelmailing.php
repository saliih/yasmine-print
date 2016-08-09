<?php

namespace MailingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * modelmailing
 *
 * @ORM\Table(name="modelmailing")
 * @ORM\Entity(repositoryClass="MailingBundle\Repository\modelmailingRepository")
 */
class modelmailing
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="template", type="text",nullable=true)
     */
    private $template;

    /**
     * @var bool
     *
     * @ORM\Column(name="send", type="boolean",nullable=true)
     */
    private $send;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="datetime",nullable=true)
     */
    private $dcr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finshed", type="datetime",nullable=true)
     */
    private $finshed;

    /**
     * @var int
     *
     * @ORM\Column(name="opened", type="integer",nullable=true)
     */
    private $opened;

    /**
     * @var int
     *
     * @ORM\Column(name="sended", type="integer",nullable=true)
     */
    private $sended;
    /**
     * @var int
     *
     * @ORM\Column(name="total", type="integer",nullable=true)
     */
    private $total;
    /**
     * @ORM\OneToMany(targetEntity="MailingBundle\Entity\processmailing", mappedBy="model", cascade={"persist"})
     */
    private $process;
    public function __construct()
    {
        $this->send = false;
        $this->dcr = new \DateTime();
        $this->opened = 0;
        $this->total = 0;
        $this->sended = 0;
    }
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
     * Set title
     *
     * @param string $title
     * @return modelmailing
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
     * Set template
     *
     * @param string $template
     * @return modelmailing
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Get template
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set send
     *
     * @param boolean $send
     * @return modelmailing
     */
    public function setSend($send)
    {
        $this->send = $send;

        return $this;
    }

    /**
     * Get send
     *
     * @return boolean
     */
    public function getSend()
    {
        return $this->send;
    }

    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return modelmailing
     */
    public function setDcr($dcr)
    {
        $this->dcr = $dcr;

        return $this;
    }

    /**
     * Get dcr
     *
     * @return \DateTime
     */
    public function getDcr()
    {
        return $this->dcr;
    }

    /**
     * Set finshed
     *
     * @param \DateTime $finshed
     * @return modelmailing
     */
    public function setFinshed($finshed)
    {
        $this->finshed = $finshed;

        return $this;
    }

    /**
     * Get finshed
     *
     * @return \DateTime
     */
    public function getFinshed()
    {
        return $this->finshed;
    }

    /**
     * Set opened
     *
     * @param integer $opened
     * @return modelmailing
     */
    public function setOpened($opened)
    {
        $this->opened = $opened;

        return $this;
    }

    /**
     * Get opened
     *
     * @return integer
     */
    public function getOpened()
    {
        return $this->opened;
    }

    /**
     * Set sended
     *
     * @param integer $sended
     * @return modelmailing
     */
    public function setSended($sended)
    {
        $this->sended = $sended;

        return $this;
    }

    /**
     * Get sended
     *
     * @return integer
     */
    public function getSended()
    {
        return $this->sended;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return modelmailing
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Add process
     *
     * @param \MailingBundle\Entity\processmailing $process
     * @return modelmailing
     */
    public function addProcess(\MailingBundle\Entity\processmailing $process)
    {
        $this->process[] = $process;

        return $this;
    }

    /**
     * Remove process
     *
     * @param \MailingBundle\Entity\processmailing $process
     */
    public function removeProcess(\MailingBundle\Entity\processmailing $process)
    {
        $this->process->removeElement($process);
    }

    /**
     * Get process
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProcess()
    {
        return $this->process;
    }
}
