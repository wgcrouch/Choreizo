<?php

namespace Choreizo\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *
 * @ORM\Table(name="vote")
 * @ORM\Entity
 */
class Vote
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
     * @var boolean
     *
     * @ORM\Column(name="positive", type="boolean")
     */
    private $positive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="Chore", inversedBy="votes")
     */
    private $chore;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="votes")
     */
    private $user;

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
     * Set positive
     *
     * @param boolean $positive
     * @return Vote
     */
    public function setPositive($positive)
    {
        $this->positive = $positive;
    
        return $this;
    }

    /**
     * Get positive
     *
     * @return boolean 
     */
    public function getPositive()
    {
        return $this->positive;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Vote
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set chore
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Chore $chore
     * @return Vote
     */
    public function setChore(\Choreizo\Bundle\BaseBundle\Entity\Chore $chore = null)
    {
        $this->chore = $chore;
    
        return $this;
    }

    /**
     * Get chore
     *
     * @return \Choreizo\Bundle\BaseBundle\Entity\Chore 
     */
    public function getChore()
    {
        return $this->chore;
    }

    /**
     * Set user
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\User $user
     * @return Vote
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
}
