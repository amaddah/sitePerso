<?php

namespace AMBundle\Entity;

use AMBundle\AMBundle;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="AMBundle\Repository\FormationRepository")
 */
class Formation
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
     * @ORM\Column(name="institut", type="string", length=255)
     */
    private $institut;

    /**
     * @var string
     *
     * @ORM\Column(name="diplome", type="string", length=255)
     */
    private $diplome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="datetime")
     */
    private $dateFin;

    /**
     * @var ArrayCollection|Experience[]
     * @ORM\OneToMany(targetEntity="AMBundle\Entity\Experience", mappedBy="formation")
     */
    private $experiences;

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
     * Set institut
     *
     * @param string $institut
     *
     * @return Formation
     */
    public function setInstitut($institut)
    {
        $this->institut = $institut;

        return $this;
    }

    /**
     * Get institut
     *
     * @return string
     */
    public function getInstitut()
    {
        return $this->institut;
    }

    /**
     * Set diplome
     *
     * @param string $diplome
     *
     * @return Formation
     */
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return string
     */
    public function getDiplome()
    {
        return $this->diplome;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Formation
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Formation
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }


    /* Ajoute une experience */
    public function addExperience(Experience $experience)
    {
        $this->experiences->add($experience);
        $experience->setFormation($this);
    }


    /* Supprime une experience */
    public function removeApplication(Experience $experience)
    {
        $this->experiences->removeElement($experience);
        $experience->setFormation(null);
    }


    /**
     * Get experiences
     *
     * @return array
     */
    public function getExperiences()
    {
        return $this->experiences;
    }
}

