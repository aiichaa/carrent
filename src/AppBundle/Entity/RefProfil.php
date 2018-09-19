<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RefProfil
 *
 * @ORM\Table(name="ref_profil")
 * @ORM\Entity
 */
class RefProfil
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="string", length=64, nullable=true)
     */
    private $profil;

    /**
     * @var string
     *
     * @ORM\Column(name="profil_sf", type="string", length=64, nullable=true)
     */
    private $profilSf;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="profil")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set profil
     *
     * @param string $profil
     *
     * @return RefProfil
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return string
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set profilSf
     *
     * @param string $profilSf
     *
     * @return RefProfil
     */
    public function setProfilSf($profilSf)
    {
        $this->profilSf = $profilSf;

        return $this;
    }

    /**
     * Get profilSf
     *
     * @return string
     */
    public function getProfilSf()
    {
        return $this->profilSf;
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return RefProfil
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }
}
