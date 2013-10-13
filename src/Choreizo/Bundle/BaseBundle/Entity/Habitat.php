<?php
namespace Choreizo\Bundle\BaseBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Habitat
 *
 * @ORM\Table(name="habitat")
 * @ORM\Entity
 */
class Habitat
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
     * @var integer
     *
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Chore", mappedBy="habitat")
     */
    protected $chores;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="habitat")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
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

    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Habitat
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Add users
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\User $users
     * @return Habitat
     */
    public function addUser(\Choreizo\Bundle\BaseBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\User $users
     */
    public function removeUser(\Choreizo\Bundle\BaseBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add chores
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Chore $chores
     * @return Habitat
     */
    public function addChore(\Choreizo\Bundle\BaseBundle\Entity\Chore $chores)
    {
        $this->chores[] = $chores;
    
        return $this;
    }

    /**
     * Remove chores
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Chore $chores
     */
    public function removeChore(\Choreizo\Bundle\BaseBundle\Entity\Chore $chores)
    {
        $this->chores->removeElement($chores);
    }

    /**
     * Get chores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChores()
    {
        return $this->chores;
    }
}