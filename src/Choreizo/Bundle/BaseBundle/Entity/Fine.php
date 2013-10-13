<?php

namespace Choreizo\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fine
 *
 * @ORM\Table(name="fine")
 * @ORM\Entity
 */
class Fine
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
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="settled", type="boolean")
     */
    private $settled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="fines")
     */
    private $source_user;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="credits")
     */
    private $target_user;

    /**
     * @ORM\ManyToOne(targetEntity="Transaction", inversedBy="fines")
     */
    private $transaction;

    /**
     * @ORM\ManyToOne(targetEntity="Chore", inversedBy="fines")
     */
    private $chore;

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
     * Set amount
     *
     * @param integer $amount
     * @return Fine
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set settled
     *
     * @param boolean $settled
     * @return Fine
     */
    public function setSettled($settled)
    {
        $this->settled = $settled;
    
        return $this;
    }

    /**
     * Get settled
     *
     * @return boolean 
     */
    public function getSettled()
    {
        return $this->settled;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Fine
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
     * Set source_user
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\User $sourceUser
     * @return Fine
     */
    public function setSourceUser(\Choreizo\Bundle\BaseBundle\Entity\User $sourceUser = null)
    {
        $this->source_user = $sourceUser;
    
        return $this;
    }

    /**
     * Get source_user
     *
     * @return \Choreizo\Bundle\BaseBundle\Entity\User 
     */
    public function getSourceUser()
    {
        return $this->source_user;
    }

    /**
     * Set target_user
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\User $targetUser
     * @return Fine
     */
    public function setTargetUser(\Choreizo\Bundle\BaseBundle\Entity\User $targetUser = null)
    {
        $this->target_user = $targetUser;
    
        return $this;
    }

    /**
     * Get target_user
     *
     * @return \Choreizo\Bundle\BaseBundle\Entity\User 
     */
    public function getTargetUser()
    {
        return $this->target_user;
    }

    /**
     * Set transaction
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Transaction $transaction
     * @return Fine
     */
    public function setTransaction(\Choreizo\Bundle\BaseBundle\Entity\Transaction $transaction = null)
    {
        $this->transaction = $transaction;
    
        return $this;
    }

    /**
     * Get transaction
     *
     * @return \Choreizo\Bundle\BaseBundle\Entity\Transaction 
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Set chore
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Chore $chore
     * @return Fine
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
}
