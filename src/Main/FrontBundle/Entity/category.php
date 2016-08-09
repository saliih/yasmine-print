<?php

namespace Main\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Main\FrontBundle\Repository\categoryRepository")
 */
class category
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
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=12)
     */
    private $color;

    /**
     * @ORM\OneToMany(targetEntity="products", mappedBy="category", cascade={"persist"})
     */
    private $produits;
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
     * @return category
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Get nome
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
     * @return category
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
     * Set color
     *
     * @param string $color
     *
     * @return category
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }
    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add produit
     *
     * @param \Main\FrontBundle\Entity\products $produit
     *
     * @return category
     */
    public function addProduit(\Main\FrontBundle\Entity\products $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \Main\FrontBundle\Entity\products $produit
     */
    public function removeProduit(\Main\FrontBundle\Entity\products $produit)
    {
        $this->produits->removeElement($produit);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduits()
    {
        return $this->produits;
    }
}
