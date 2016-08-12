<?php

namespace Main\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="Main\FrontBundle\Repository\clientRepository")
 */
class client
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
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="datetime", nullable=true)
     */
    private $dcr;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="gsm", type="string", length=255)
     */
    private $gsm;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;


    /**
     * @ORM\ManyToOne(targetEntity="category", inversedBy="client")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $category;
    /**
     * @var integer
     *
     * @ORM\Column(name="plis", type="integer", nullable=true)
     */
    private $plis;
    /**
     * @var integer
     *
     * @ORM\Column(name="opti", type="integer", nullable=true)
     */
    private $option;
    /**
     * @var array
     *
     * @ORM\Column(name="template", type="json_array", nullable=true)
     */
    private $template;
    /**
     * @var array
     *
     * @ORM\Column(name="caddy", type="json_array", nullable=true)
     */
    private $caddy;
    public function __construct()
    {
        $this->dcr = new \DateTime();
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
     * @return client
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
     * Set dcr
     *
     * @param \DateTime $dcr
     *
     * @return client
     */
    public function setDcr($dcr)
    {
        $this->dcr = $dcr;

        return $this;
    }

    /**
     * Get dcr
     *
     * @return \DateTime
     */
    public function getDcr()
    {
        return $this->dcr;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return client
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
     * Set gsm
     *
     * @param string $gsm
     *
     * @return client
     */
    public function setGsm($gsm)
    {
        $this->gsm = $gsm;

        return $this;
    }

    /**
     * Get gsm
     *
     * @return string
     */
    public function getGsm()
    {
        return $this->gsm;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return client
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set plis
     *
     * @param integer $plis
     *
     * @return client
     */
    public function setPlis($plis)
    {
        $this->plis = $plis;

        return $this;
    }

    /**
     * Get plis
     *
     * @return integer
     */
    public function getPlis()
    {
        return $this->plis;
    }

    /**
     * Set option
     *
     * @param integer $option
     *
     * @return client
     */
    public function setOption($option)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * Get option
     *
     * @return integer
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * Set template
     *
     * @param array $template
     *
     * @return client
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Get template
     *
     * @return array
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set category
     *
     * @param \Main\FrontBundle\Entity\category $category
     *
     * @return client
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
     * Set caddy
     *
     * @param array $caddy
     *
     * @return client
     */
    public function setCaddy($caddy)
    {
        $this->caddy = $caddy;

        return $this;
    }

    /**
     * Get caddy
     *
     * @return array
     */
    public function getCaddy()
    {
        return $this->caddy;
    }
}
