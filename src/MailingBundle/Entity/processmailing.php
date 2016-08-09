<?php

namespace MailingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * processmailing
 *
 * @ORM\Table(name="processmailing")
 * @ORM\Entity(repositoryClass="MailingBundle\Repository\processmailingRepository")
 */
class processmailing
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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="modelmailing", inversedBy="process")
     * @ORM\JoinColumn(name="tpl_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $model;

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
     * Set email
     *
     * @param string $email
     * @return processmailing
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set model
     *
     * @param \MailingBundle\Entity\modelmailing $model
     * @return processmailing
     */
    public function setModel(\MailingBundle\Entity\modelmailing $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \MailingBundle\Entity\modelmailing 
     */
    public function getModel()
    {
        return $this->model;
    }
}
