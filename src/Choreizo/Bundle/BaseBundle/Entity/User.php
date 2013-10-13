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
    protected $created_chores;

    /**
     * @ORM\OneToMany(targetEntity="Chore", mappedBy="target_user")
     */
    protected $todo_chores;

    /**
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="user")
     */
    protected $votes;

    /**
     * @ORM\OneToMany(targetEntity="Fine", mappedBy="source_user")
     */
    protected $fines;

    /**
     * @ORM\OneToMany(targetEntity="Fine", mappedBy="target_user")
     */
    protected $credits;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $lastName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $accessToken;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $refreshToken;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $invite;
    

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

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set accessToken
     *
     * @param string $accessToken
     * @return User
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    
        return $this;
    }

    /**
     * Get accessToken
     *
     * @return string 
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Set refreshToken
     *
     * @param string $refreshToken
     * @return User
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
    
        return $this;
    }

    /**
     * Get refreshToken
     *
     * @return string 
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * Add fines
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Fine $fines
     * @return User
     */
    public function addFine(\Choreizo\Bundle\BaseBundle\Entity\Fine $fines)
    {
        $this->fines[] = $fines;
    }

    /**
     * Set invite
     *
     * @param boolean $invite
     * @return User
     */
    public function setInvite($invite)
    {
        $this->invite = $invite;

        return $this;
    }

    /**
     * Remove fines
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Fine $fines
     */
    public function removeFine(\Choreizo\Bundle\BaseBundle\Entity\Fine $fines)
    {
        $this->fines->removeElement($fines);
    }

    /**
     * Get fines
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFines()
    {
        return $this->fines;
    }

    /**
     * Add credits
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Fine $credits
     * @return User
     */
    public function addCredit(\Choreizo\Bundle\BaseBundle\Entity\Fine $credits)
    {
        $this->credits[] = $credits;
    
        return $this;
    }

    /**
     * Remove credits
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Fine $credits
     */
    public function removeCredit(\Choreizo\Bundle\BaseBundle\Entity\Fine $credits)
    {
        $this->credits->removeElement($credits);
    }

    /**
     * Get credits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * Get invite
     *
     * @return boolean 
     */
    public function getInvite()
    {
        return $this->invite;

    }

    /**
     * Add created_chores
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Chore $createdChores
     * @return User
     */
    public function addCreatedChore(\Choreizo\Bundle\BaseBundle\Entity\Chore $createdChores)
    {
        $this->created_chores[] = $createdChores;
    
        return $this;
    }

    /**
     * Remove created_chores
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Chore $createdChores
     */
    public function removeCreatedChore(\Choreizo\Bundle\BaseBundle\Entity\Chore $createdChores)
    {
        $this->created_chores->removeElement($createdChores);
    }

    /**
     * Get created_chores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCreatedChores()
    {
        return $this->created_chores;
    }

    /**
     * Add todo_chores
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Chore $todoChores
     * @return User
     */
    public function addTodoChore(\Choreizo\Bundle\BaseBundle\Entity\Chore $todoChores)
    {
        $this->todo_chores[] = $todoChores;
    
        return $this;
    }

    /**
     * Remove todo_chores
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Chore $todoChores
     */
    public function removeTodoChore(\Choreizo\Bundle\BaseBundle\Entity\Chore $todoChores)
    {
        $this->todo_chores->removeElement($todoChores);
    }

    /**
     * Get todo_chores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTodoChores()
    {
        return $this->todo_chores;
    }
}