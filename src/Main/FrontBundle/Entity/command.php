<?php

namespace Main\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * command
 *
 * @ORM\Table(name="command")
 * @ORM\Entity(repositoryClass="Main\FrontBundle\Repository\commandRepository")
 */
class command
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
     * @ORM\Column(name="ref", type="string", length=255)
     */
    private $ref;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="datetime")
     */
    private $dcr;

    /**
     * @var bool
     *
     * @ORM\Column(name="act", type="boolean")
     */
    private $act;
    /**
     * @ORM\OneToMany(targetEntity="cmdorder", mappedBy="cmd", cascade={"persist"})
     */
    private $detail;
    /**
     * @ORM\ManyToOne(targetEntity="client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     **/
    private $client;
    /**
     * @var array
     *
     * @ORM\Column(name="aaaa", type="array")
     */
    private $toprint;
    /**
     * tostring
     */
    public function __toString()
    {
        return $this->ref;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dcr = new \DateTime();
        $this->act = false;
        $this->detail = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set ref
     *
     * @param string $ref
     *
     * @return command
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     *
     * @return command
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
     * Set act
     *
     * @param boolean $act
     *
     * @return command
     */
    public function setAct($act)
    {
        $this->act = $act;

        return $this;
    }

    /**
     * Get act
     *
     * @return boolean
     */
    public function getAct()
    {
        return $this->act;
    }

    /**
     * Add detail
     *
     * @param \Main\FrontBundle\Entity\cmdorder $detail
     *
     * @return command
     */
    public function addDetail(\Main\FrontBundle\Entity\cmdorder $detail)
    {
        $this->detail[] = $detail;

        return $this;
    }

    /**
     * Remove detail
     *
     * @param \Main\FrontBundle\Entity\cmdorder $detail
     */
    public function removeDetail(\Main\FrontBundle\Entity\cmdorder $detail)
    {
        $this->detail->removeElement($detail);
    }

    /**
     * Get detail
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set client
     *
     * @param \Main\FrontBundle\Entity\client $client
     *
     * @return command
     */
    public function setClient(\Main\FrontBundle\Entity\client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Main\FrontBundle\Entity\client
     */
    public function getClient()
    {
        return $this->client;
    }


    /**
     * Set toprint
     *
     * @param array $toprint
     *
     * @return command
     */
    public function setToprint($toprint)
    {
        $this->toprint = $toprint;

        return $this;
    }

    /**
     * Get toprint
     *
     * @return array
     */
    public function getToprint()
    {
        return $this->toprint;
    }
}
