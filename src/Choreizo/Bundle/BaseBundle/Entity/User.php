<?php
namespace Choreizo\Bundle\BaseBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Habitat", inversedBy="users")
     */
    protected $habitat;

    /**
     * @ORM\OneToMany(targetEntity="Chore", mappedBy="user")
     */
    protected $chores;

    /**
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="user")
     */
    protected $votes;

    public function __construct()
    {
        parent::__construct();
        // your own logic
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
     * Set habitat
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Habitat $habitat
     * @return User
     */
    public function setHabitat(\Choreizo\Bundle\BaseBundle\Entity\Habitat $habitat = null)
    {
        $this->habitat = $habitat;
    
        return $this;
    }

    /**
     * Get habitat
     *
     * @return \Choreizo\Bundle\BaseBundle\Entity\Habitat 
     */
    public function getHabitat()
    {
        return $this->habitat;
    }

    /**
     * Add chores
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Chore $chores
     * @return User
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

    /**
     * Add votes
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Vote $votes
     * @return User
     */
    public function addVote(\Choreizo\Bundle\BaseBundle\Entity\Vote $votes)
    {
        $this->votes[] = $votes;
    
        return $this;
    }

    /**
     * Remove votes
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Vote $votes
     */
    public function removeVote(\Choreizo\Bundle\BaseBundle\Entity\Vote $votes)
    {
        $this->votes->removeElement($votes);
    }

    /**
     * Get votes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVotes()
    {
        return $this->votes;
    }
}