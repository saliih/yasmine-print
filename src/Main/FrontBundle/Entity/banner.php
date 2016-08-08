<?php

namespace Main\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * banner
 *
 * @ORM\Table(name="banner")
 * @ORM\Entity(repositoryClass="Main\FrontBundle\Repository\bannerRepository")
 */
class banner
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
     * @var int
     *
     * @ORM\Column(name="ord", type="integer", nullable=true)
     */
    private $ord;
    /**
     * @var string
     *
     * @ORM\Column(name="brochure",type="string", nullable=true)
     */
    private $brochure;
    public function getBrochure()
    {
        return $this->brochure;
    }
    public function setBrochure($brochure)
    {
        $this->brochure = $brochure;
        return $this;
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
     * @return banner
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
     * Set ord
     *
     * @param integer $ord
     *
     * @return banner
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
}
