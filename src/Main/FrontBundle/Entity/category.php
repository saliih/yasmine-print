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
    /**
     * @ORM\ManyToMany(targetEntity="plis", inversedBy="category" , cascade={"persist"})
     * @ORM\JoinTable(name="categories_plis",
     *      joinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="plis_id", referencedColumnName="id",nullable=true)}
     *      )
     */
    private $plis;
    /**
     * @ORM\OneToMany(targetEntity="prodoptions", mappedBy="category", cascade={"persist"})
     */
    private $options;
    /**
     * @ORM\OneToMany(targetEntity="tplprod", mappedBy="category", cascade={"persist"})
     */
    private $tplprod;
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

    /**
     * Add pli
     *
     * @param \Main\FrontBundle\Entity\plis $pli
     *
     * @return category
     */
    public function addPli(\Main\FrontBundle\Entity\plis $pli)
    {
        $this->plis[] = $pli;

        return $this;
    }

    /**
     * Remove pli
     *
     * @param \Main\FrontBundle\Entity\plis $pli
     */
    public function removePli(\Main\FrontBundle\Entity\plis $pli)
    {
        $this->plis->removeElement($pli);
    }

    /**
     * Get plis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlis()
    {
        return $this->plis;
    }

    /**
     * Add option
     *
     * @param \Main\FrontBundle\Entity\prodoptions $option
     *
     * @return category
     */
    public function addOption(\Main\FrontBundle\Entity\prodoptions $option)
    {
        $this->options[] = $option;

        return $this;
    }

    /**
     * Remove option
     *
     * @param \Main\FrontBundle\Entity\prodoptions $option
     */
    public function removeOption(\Main\FrontBundle\Entity\prodoptions $option)
    {
        $this->options->removeElement($option);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Add tplprod
     *
     * @param \Main\FrontBundle\Entity\tplprod $tplprod
     *
     * @return category
     */
    public function addTplprod(\Main\FrontBundle\Entity\tplprod $tplprod)
    {
        $this->tplprod[] = $tplprod;

        return $this;
    }

    /**
     * Remove tplprod
     *
     * @param \Main\FrontBundle\Entity\tplprod $tplprod
     */
    public function removeTplprod(\Main\FrontBundle\Entity\tplprod $tplprod)
    {
        $this->tplprod->removeElement($tplprod);
    }

    /**
     * Get tplprod
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTplprod()
    {
        return $this->tplprod;
    }
}
