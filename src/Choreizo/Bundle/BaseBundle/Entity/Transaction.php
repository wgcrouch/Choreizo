<?php

namespace Choreizo\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transaction
 *
 * @ORM\Table(name="transaction")
 * @ORM\Entity
 */
class Transaction
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
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="processed", type="datetime")
     */
    private $processed;

    /**
     * @ORM\OneToMany(targetEntity="Fine", mappedBy="transaction")
     */
    private $fines;


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
     * @param \DateTime $amount
     * @return Transaction
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return \DateTime 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Transaction
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
     * Set processed
     *
     * @param \DateTime $processed
     * @return Transaction
     */
    public function setProcessed($processed)
    {
        $this->processed = $processed;
    
        return $this;
    }

    /**
     * Get processed
     *
     * @return \DateTime 
     */
    public function getProcessed()
    {
        return $this->processed;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fines = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add fines
     *
     * @param \Choreizo\Bundle\BaseBundle\Entity\Fine $fines
     * @return Transaction
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