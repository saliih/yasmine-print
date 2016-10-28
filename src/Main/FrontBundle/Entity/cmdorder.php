<?php

namespace Main\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cmdorder
 *
 * @ORM\Table(name="cmdorder")
 * @ORM\Entity(repositoryClass="Main\FrontBundle\Repository\cmdorderRepository")
 */
class cmdorder
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
     * @ORM\ManyToOne(targetEntity="category")
     * @ORM\JoinColumn(name="prod_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $prodid;

    /**
     * @ORM\ManyToOne(targetEntity="plis")
     * @ORM\JoinColumn(name="plis_id", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     **/
    private $pli;
    /**
     * @var integer
     *
     * @ORM\Column(name="qte", type="integer")
     */
    private $qte;

    /**
     * @ORM\ManyToOne(targetEntity="prodoptions")
     * @ORM\JoinColumn(name="opt_id", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     **/
    private $opt;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="command", inversedBy="detail")
     * @ORM\JoinColumn(name="cmd_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $cmd;

    /**
     * @var array
     *
     * @ORM\Column(name="customise", type="array")
     */
    private $customise;
    /**
     * tostring
     */
    public function __toString()
    {
        return $this->getProdid()->getName();
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
     * Set qte
     *
     * @param integer $qte
     *
     * @return cmdorder
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return integer
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return cmdorder
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set customise
     *
     * @param array $customise
     *
     * @return cmdorder
     */
    public function setCustomise($customise)
    {
        $this->customise = $customise;

        return $this;
    }

    /**
     * Get customise
     *
     * @return array
     */
    public function getCustomise()
    {
        return $this->customise;
    }

    /**
     * Set prodid
     *
     * @param \Main\FrontBundle\Entity\category $prodid
     *
     * @return cmdorder
     */
    public function setProdid(\Main\FrontBundle\Entity\category $prodid = null)
    {
        $this->prodid = $prodid;

        return $this;
    }

    /**
     * Get prodid
     *
     * @return \Main\FrontBundle\Entity\category
     */
    public function getProdid()
    {
        return $this->prodid;
    }

    /**
     * Set pli
     *
     * @param \Main\FrontBundle\Entity\plis $pli
     *
     * @return cmdorder
     */
    public function setPli(\Main\FrontBundle\Entity\plis $pli = null)
    {
        $this->pli = $pli;

        return $this;
    }

    /**
     * Get pli
     *
     * @return \Main\FrontBundle\Entity\plis
     */
    public function getPli()
    {
        return $this->pli;
    }

    /**
     * Set opt
     *
     * @param \Main\FrontBundle\Entity\prodoptions $opt
     *
     * @return cmdorder
     */
    public function setOpt(\Main\FrontBundle\Entity\prodoptions $opt = null)
    {
        $this->opt = $opt;

        return $this;
    }

    /**
     * Get opt
     *
     * @return \Main\FrontBundle\Entity\prodoptions
     */
    public function getOpt()
    {
        return $this->opt;
    }

    /**
     * Set cmd
     *
     * @param \Main\FrontBundle\Entity\command $cmd
     *
     * @return cmdorder
     */
    public function setCmd(\Main\FrontBundle\Entity\command $cmd = null)
    {
        $this->cmd = $cmd;

        return $this;
    }

    /**
     * Get cmd
     *
     * @return \Main\FrontBundle\Entity\command
     */
    public function getCmd()
    {
        return $this->cmd;
    }
}
