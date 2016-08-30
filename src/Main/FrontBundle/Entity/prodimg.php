<?php

namespace Main\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * prodimg
 *
 * @ORM\Table(name="prodimg")
 * @ORM\Entity(repositoryClass="Main\FrontBundle\Repository\prodimgRepository")
 */
class prodimg
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
     * @ORM\Column(name="img", type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @ORM\ManyToOne(targetEntity="category", inversedBy="prodimg")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $category;
    /**
     * @var int
     *
     * @ORM\Column(name="ord", type="integer")
     */
    private $ord;


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
     * Set img
     *
     * @param string $img
     *
     * @return prodimg
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     *
     * @return prodimg
     */
    public function setOrd($ord)
    {
        $this->ord = $ord;

        return $this;
    }

    /**
     * Get ord
     *
     * @return int
     */
    public function getOrd()
    {
        return $this->ord;
    }

    /**
     * Set category
     *
     * @param \Main\FrontBundle\Entity\category $category
     *
     * @return prodimg
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
}
