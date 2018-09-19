<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * File
 *
 * @ORM\Table(name="file", indexes={@ORM\Index(name="reference", columns={"reference"})})
 * @ORM\Entity
 */
class File
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
     * @ORM\Column(name="file_name", type="string", length=255, nullable=true)
     */
    private $fileName;

    /**
     * @var \RefFile
     *
     * @ORM\ManyToOne(targetEntity="RefFile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reference", referencedColumnName="id")
     * })
     */
    private $reference;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="file")
     * @ORM\JoinTable(name="lnk_file_user",
     *   joinColumns={
     *     @ORM\JoinColumn(name="file_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   }
     * )
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Vehicle", inversedBy="file")
     * @ORM\JoinTable(name="lnk_file_vehicle",
     *   joinColumns={
     *     @ORM\JoinColumn(name="file_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="vehicle_id", referencedColumnName="id")
     *   }
     * )
     */
    private $vehicle;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
        $this->vehicle = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set fileName
     *
     * @param string $fileName
     *
     * @return File
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set reference
     *
     * @param \AppBundle\Entity\RefFile $reference
     *
     * @return File
     */
    public function setReference(\AppBundle\Entity\RefFile $reference = null)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return \AppBundle\Entity\RefFile
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return File
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

    /**
     * Add vehicle
     *
     * @param \AppBundle\Entity\Vehicle $vehicle
     *
     * @return File
     */
    public function addVehicle(\AppBundle\Entity\Vehicle $vehicle)
    {
        $this->vehicle[] = $vehicle;

        return $this;
    }

    /**
     * Remove vehicle
     *
     * @param \AppBundle\Entity\Vehicle $vehicle
     */
    public function removeVehicle(\AppBundle\Entity\Vehicle $vehicle)
    {
        $this->vehicle->removeElement($vehicle);
    }

    /**
     * Get vehicle
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }
}
