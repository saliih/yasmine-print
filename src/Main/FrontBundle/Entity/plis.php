<?php

namespace Main\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plis
 *
 * @ORM\Table(name="plis")
 * @ORM\Entity(repositoryClass="Main\FrontBundle\Repository\plisRepository")
 */
class plis
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
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;
    protected $SERVER_PATH_TO_IMAGE_FOLDER = 'uploads/plis';
    /**
     * @ORM\ManyToMany(targetEntity="category", mappedBy="plis")
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private $category;

    public function __toString()
    {
        return $this->name;
    }

    public function upload()
    {

        // the file property can be empty if the field is not required
        if (null === $this->getImage()) {
            return;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and target filename as params
        $this->getImage()->move(
            $this->SERVER_PATH_TO_IMAGE_FOLDER,
            $this->getImage()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->image = $this->getImage()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        // $this->setBrochure(null);
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
     * @return Plis
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
     * Set image
     *
     * @param string $image
     *
     * @return Plis
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add category
     *
     * @param \Main\FrontBundle\Entity\category $category
     *
     * @return plis
     */
    public function addCategory(\Main\FrontBundle\Entity\category $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \Main\FrontBundle\Entity\category $category
     */
    public function removeCategory(\Main\FrontBundle\Entity\category $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }
}
