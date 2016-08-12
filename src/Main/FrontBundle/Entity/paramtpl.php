<?php

namespace Main\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * paramtpl
 *
 * @ORM\Table(name="paramtpl")
 * @ORM\Entity(repositoryClass="Main\FrontBundle\Repository\paramtplRepository")
 */
class paramtpl
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
     * @var float
     *
     * @ORM\Column(name="x1", type="float", nullable=true)
     */
    private $x1;

    /**
     * @var float
     *
     * @ORM\Column(name="x2", type="float", nullable=true)
     */
    private $x2;

    /**
     * @var float
     *
     * @ORM\Column(name="y1", type="float", nullable=true)
     */
    private $y1;

    /**
     * @var float
     *
     * @ORM\Column(name="y2", type="float", nullable=true)
     */
    private $y2;

    /**
     * @var float
     *
     * @ORM\Column(name="size", type="float", nullable=true)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="police", type="string", length=255, nullable=true)
     */
    private $police;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="align", type="string", length=255, nullable=true)
     */
    private $align;
    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity="tplprod", inversedBy="parameters")
     * @ORM\JoinColumn(name="param_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $tpl;



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
     * Set x1
     *
     * @param float $x1
     *
     * @return paramtpl
     */
    public function setX1($x1)
    {
        $this->x1 = $x1;

        return $this;
    }

    /**
     * Get x1
     *
     * @return float
     */
    public function getX1()
    {
        return $this->x1;
    }

    /**
     * Set x2
     *
     * @param float $x2
     *
     * @return paramtpl
     */
    public function setX2($x2)
    {
        $this->x2 = $x2;

        return $this;
    }

    /**
     * Get x2
     *
     * @return float
     */
    public function getX2()
    {
        return $this->x2;
    }

    /**
     * Set y1
     *
     * @param float $y1
     *
     * @return paramtpl
     */
    public function setY1($y1)
    {
        $this->y1 = $y1;

        return $this;
    }

    /**
     * Get y1
     *
     * @return float
     */
    public function getY1()
    {
        return $this->y1;
    }

    /**
     * Set y2
     *
     * @param float $y2
     *
     * @return paramtpl
     */
    public function setY2($y2)
    {
        $this->y2 = $y2;

        return $this;
    }

    /**
     * Get y2
     *
     * @return float
     */
    public function getY2()
    {
        return $this->y2;
    }

    /**
     * Set size
     *
     * @param float $size
     *
     * @return paramtpl
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return float
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set police
     *
     * @param string $police
     *
     * @return paramtpl
     */
    public function setPolice($police)
    {
        $this->police = $police;

        return $this;
    }

    /**
     * Get police
     *
     * @return string
     */
    public function getPolice()
    {
        return $this->police;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return paramtpl
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set align
     *
     * @param string $align
     *
     * @return paramtpl
     */
    public function setAlign($align)
    {
        $this->align = $align;

        return $this;
    }

    /**
     * Get align
     *
     * @return string
     */
    public function getAlign()
    {
        return $this->align;
    }

    /**
     * Set tpl
     *
     * @param \Main\FrontBundle\Entity\tplprod $tpl
     *
     * @return paramtpl
     */
    public function setTpl(\Main\FrontBundle\Entity\tplprod $tpl = null)
    {
        $this->tpl = $tpl;

        return $this;
    }

    /**
     * Get tpl
     *
     * @return \Main\FrontBundle\Entity\tplprod
     */
    public function getTpl()
    {
        return $this->tpl;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return paramtpl
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
}
