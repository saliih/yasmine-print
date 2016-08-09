<?php

namespace PrintBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * pdflist
 *
 * @ORM\Table(name="pdflist")
 * @ORM\Entity(repositoryClass="PrintBundle\Repository\pdflistRepository")
 */
class pdflist
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
     * @ORM\Column(name="filepdf", type="string", length=255, nullable=true)
     */
    private $file;
    /**
     * @var float
     *
     * @ORM\Column(name="ocurrence", type="float", nullable=true)
     */
    private $repeat;

    /**
     * @ORM\ManyToOne(targetEntity="Pdfmerge", inversedBy="pdflist")
     * @ORM\JoinColumn(name="pdfmerge_id", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     **/
    private $pdfmerge;
    public function __construct()
    {
        $this->repeat = 1;
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
     * Set file
     *
     * @param string $file
     *
     * @return pdflist
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set repeat
     *
     * @param float $repeat
     *
     * @return pdflist
     */
    public function setRepeat($repeat)
    {
        $this->repeat = $repeat;

        return $this;
    }

    /**
     * Get repeat
     *
     * @return float
     */
    public function getRepeat()
    {
        return $this->repeat;
    }

    /**
     * Set pdfmerge
     *
     * @param \PrintBundle\Entity\Pdfmerge $pdfmerge
     *
     * @return pdflist
     */
    public function setPdfmerge(\PrintBundle\Entity\Pdfmerge $pdfmerge = null)
    {
        $this->pdfmerge = $pdfmerge;

        return $this;
    }

    /**
     * Get pdfmerge
     *
     * @return \PrintBundle\Entity\Pdfmerge
     */
    public function getPdfmerge()
    {
        return $this->pdfmerge;
    }
}
