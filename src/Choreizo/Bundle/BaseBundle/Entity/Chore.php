<?php

namespace Choreizo\Bundle\BaseBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Chore
 *
 * @ORM\Table(name="chore")
 * @ORM\Entity
 */
class Chore
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Habitat", inversedBy="chores")
     * @var [type]
     */
    protected $habitat;

    /**
     * @var integer
     *
     * @ORM\Column(name="fine_amount", type="integer")
     */
    private $fineAmount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="completed", type="boolean")
     */
    private $completed;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deadline", type="datetime")
     */
    private $deadline;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="chores")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="chore")
     * @ORM\OrderBy({"created" = "DESC"})
     */
    protected $votes;

    /**
     * @ORM\OneToMany(targetEntity="Fine", mappedBy="chore")
     */
    protected $fines;

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
     * Set name
     *
     * @param string $name
     * @return Chore
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
     * Set fineAmount
     *
     * @param integer $fineAmount
     * @return Chore
     */
    public function setFineAmount($fineAmount)
    {
        $this->fineAmount = $fineAmount;
    
        return $this;
    }

    /**
     * Get fineAmount
     *
     * @return integer 
     */
    public function getFineAmount()
    {
        return $this->fineAmount;
    }

    /**
     * Set completed
     *
     * @param boolean $completed
     * @return Chore
     */
    public function setCompleted($completed)
    {
        $this->completed = $completed;
    
        return $this;
    }

    /**
     * Get completed
     *
     * @return boolean 
     */
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * Set deadline
     *
     * @param \DateTime $deadline
     * @return Chore
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    
        return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime 
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set user
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\User $user
     * @return Chore
     */
    public function setUser(\Choreizo\Bundle\BaseBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Choreizo\Bundle\BaseBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set habitat
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Habitat $habitat
     * @return Chore
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
     * Constructor
     */
    public function __construct()
    {
        $this->votes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add votes
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Vote $votes
     * @return Chore
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

    public function getLastVote()
    {
        return $this->votes->last();
    }

    /**
     * Add fines
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Fine $fines
     * @return Chore
     */
    public function addFine(\Choreizo\Bundle\BaseBundle\Entity\Fine $fines)
    {
        $this->fines[] = $fines;
    
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
}