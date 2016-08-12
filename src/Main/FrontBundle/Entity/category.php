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
     * @var bool
     *
     * @ORM\Column(name="costumise", type="boolean")
     */
    private $costumise;
    /**
     * @var string
     *
     * @ORM\Column(name="descript", type="text", nullable=true)
     */
    private $descript;

    /**
     * @var string
     *
     * @ORM\Column(name="picture",type="string", nullable=true)
     */
    private $picture;
    protected $SERVER_PATH_TO_IMAGE_FOLDER = 'uploads/products';
    public function __toString()
    {
        return $this->name;
    }
    public function __construct()
    {
        $this->act = false;
        $this->costumise = false;
    }

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getPicture()) {
            return;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and target filename as params
        $this->getPicture()->move(
            $this->SERVER_PATH_TO_IMAGE_FOLDER,
            $this->getPicture()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->picture = $this->getPicture()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        // $this->setBrochure(null);
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
     * @return boolean
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
     * Set costumise
     *
     * @param boolean $costumise
     *
     * @return category
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

    /**
     * Set descript
     *
     * @param string $descript
     *
     * @return category
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
     * Set picture
     *
     * @param string $picture
     *
     * @return category
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }
}
