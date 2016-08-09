<?php

namespace Main\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="Main\FrontBundle\Repository\productsRepository")
 */
class products
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;
    /**
     * @var bool
     *
     * @ORM\Column(name="act", type="boolean")
     */
    private $act;
    /**
     * @var bool
     *
     * @ORM\Column(name="accostumiset", type="boolean")
     */
    private $costumise;
    /**
     * @var string
     *
     * @ORM\Column(name="descript", type="text", nullable=true)
     */
    private $descript;
    /**
     * @ORM\ManyToOne(targetEntity="category", inversedBy="produits")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $category;
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
     * @return products
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
     * Set act
     *
     * @param boolean $act
     *
     * @return products
     */
    public function setAct($act)
    {
        $this->act = $act;
        return $this;
    }

    /**
     * Get act
     *
     * @return bool
     */
    public function getAct()
    {
        return $this->act;
    }

    /**
     * Set descript
     *
     * @param string $descript
     *
     * @return products
     */
    public function setDescript($descript)
    {
        $this->descript = $descript;
        return $this;
    }

    /**
     * Get descript
     *
     * @return string
     */
    public function getDescript()
    {
        return $this->descript;
    }

    /**
     * Set category
     *
     * @param \Main\FrontBundle\Entity\category $category
     *
     * @return products
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
     * Set costumise
     *
     * @param boolean $costumise
     *
     * @return products
     */
    public function setCostumise($costumise)
    {
        $this->costumise = $costumise;

        return $this;
    }

    /**
     * Get costumise
     *
     * @return boolean
     */
    public function getCostumise()
    {
        return $this->costumise;
    }
}
