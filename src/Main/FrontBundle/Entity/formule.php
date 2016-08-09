<?php

namespace Main\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * formule
 *
 * @ORM\Table(name="register")
 * @ORM\Entity
 */
class formule
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="civ", type="string", length=20)
     */
    private $civ;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="pname", type="string", length=255)
     */
    private $pname;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=10)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="Pays", type="string", length=255)
     */
    private $pays;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datenaisse", type="date")
     */
    private $datenaisse;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255)
     */
    private $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=45)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="sweb", type="string", length=255)
     */
    private $sweb;

    /**
     * @var string
     *
     * @ORM\Column(name="besoin", type="string", length=100)
     */
    private $besoin;

    /**
     * @var string
     *
     * @ORM\Column(name="msg", type="text")
     */
    private $msg;

    /**
     * @var bool
     *
     * @ORM\Column(name="newsletter", type="boolean", nullable=true)
     */
    private $newsletter;

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
     * Set civ
     *
     * @param string $civ
     * @return formule
     */
    public function setCiv($civ)
    {
        $this->civ = $civ;

        return $this;
    }

    /**
     * Get civ
     *
     * @return string 
     */
    public function getCiv()
    {
        return $this->civ;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return formule
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
     * Set pname
     *
     * @param string $pname
     * @return formule
     */
    public function setPname($pname)
    {
        $this->pname = $pname;

        return $this;
    }

    /**
     * Get pname
     *
     * @return string 
     */
    public function getPname()
    {
        return $this->pname;
    }

    /**
     * Set adress
     *
     * @param string $adress
     * @return formule
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string 
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return formule
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return formule
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return formule
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set datenaisse
     *
     * @param \DateTime $datenaisse
     * @return formule
     */
    public function setDatenaisse($datenaisse)
    {
        $this->datenaisse = $datenaisse;
        $this->datenaisse = $datenaisse;

        return $this;
    }

    /**
     * Get datenaisse
     *
     * @return \DateTime 
     */
    public function getDatenaisse()
    {
        return $this->datenaisse;
    }

    /**
     * Set profession
     *
     * @param string $profession
     * @return formule
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string 
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return formule
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return formule
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set sweb
     *
     * @param string $sweb
     * @return formule
     */
    public function setSweb($sweb)
    {
        $this->sweb = $sweb;

        return $this;
    }

    /**
     * Get sweb
     *
     * @return string 
     */
    public function getSweb()
    {
        return $this->sweb;
    }

    /**
     * Set besoin
     *
     * @param string $besoin
     * @return formule
     */
    public function setBesoin($besoin)
    {
        $this->besoin = $besoin;

        return $this;
    }

    /**
     * Get besoin
     *
     * @return string 
     */
    public function getBesoin()
    {
        return $this->besoin;
    }

    /**
     * Set msg
     *
     * @param string $msg
     * @return formule
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;

        return $this;
    }

    /**
     * Get msg
     *
     * @return string 
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * Set newsletter
     *
     * @param boolean $newsletter
     * @return formule
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * Get newsletter
     *
     * @return boolean 
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }
}
