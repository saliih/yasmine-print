<?php

namespace Main\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\PreSerialize;
use JMS\Serializer\Annotation\PostSerialize;
use JMS\Serializer\Annotation\PostDeserialize;
use JMS\Serializer\Annotation\Type;
/**
 * tplprod
 *
 * @ORM\Table(name="tplprod")
 * @ORM\Entity(repositoryClass="Main\FrontBundle\Repository\tplprodRepository")
 */
class tplprod
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     * @Expose
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="bg", type="string", length=255, nullable=true)
     * @Expose
     */
    private $bg;
    /**
     * @var string
     *
     * @ORM\Column(name="pdf", type="string", length=255, nullable=true)
     */
    private $pdf;

    /**
     * @ORM\ManyToOne(targetEntity="category", inversedBy="tplprod")
     * @ORM\JoinColumn(name="ctegory_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="paramtpl", mappedBy="tpl", cascade={"persist"})
     */
    private $parameters;

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return tplprod
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set bg
     *
     * @param string $bg
     *
     * @return tplprod
     */
    public function setBg($bg)
    {
        $this->bg = $bg;

        return $this;
    }

    /**
     * Get bg
     *
     * @return string
     */
    public function getBg()
    {
        return $this->bg;
    }

    /**
     * Set category
     *
     * @param \Main\FrontBundle\Entity\category $category
     *
     * @return tplprod
     */
    public function setCategory(\Main\FrontBundle\Entity\category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Main\FrontBundle\Entity\category
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->parameters = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add parameter
     *
     * @param \Main\FrontBundle\Entity\paramtpl $parameter
     *
     * @return tplprod
     */
    public function addParameter(\Main\FrontBundle\Entity\paramtpl $parameter)
    {
        $this->parameters[] = $parameter;

        return $this;
    }

    /**
     * Remove parameter
     *
     * @param \Main\FrontBundle\Entity\paramtpl $parameter
     */
    public function removeParameter(\Main\FrontBundle\Entity\paramtpl $parameter)
    {
        $this->parameters->removeElement($parameter);
    }

    /**
     * Get parameters
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Set pdf
     *
     * @param string $pdf
     *
     * @return tplprod
     */
    public function setPdf($pdf)
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * Get pdf
     *
     * @return string
     */
    public function getPdf()
    {
        return $this->pdf;
    }
}
