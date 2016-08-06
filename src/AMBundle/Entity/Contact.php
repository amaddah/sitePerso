<?php

namespace AMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AMBundle\Repository\ContactRepository")
 */
class Contact
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
     * @ORM\Column(name="nom", type="string", length=30)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     * @Assert\Email
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=30)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateContact", type="datetime")
     */
    private $dateContact;

    public function __construct()
    {
        $this->dateContact = new \Datetime();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Contact
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Contact
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set dateContact
     *
     * @param \DateTime $dateContact
     *
     * @return Contact
     */
    public function setDateContact($dateContact)
    {
        $this->dateContact = $dateContact;

        return $this;
    }

    /**
     * Get dateContact
     *
     * @return \DateTime
     */
    public function getDateContact()
    {
        return $this->dateContact;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}

