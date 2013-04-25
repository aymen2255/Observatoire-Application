<?php

namespace Business\OrganisationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Criteria
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Business\OrganisationBundle\Entity\CriteriaRepository")
 */
class Criteria
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(name="full_name", type="string", length=255)
     */
    private $full_name;
    
    /**
    * @ORM\ManyToOne(targetEntity="Business\OrganisationBundle\Entity\Cfamily")
    * @ORM\JoinColumn(nullable=false)
    */
   private $cfamily ;

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
     * @return Criteria
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
     * Set full_name
     *
     * @param string $fullName
     * @return Criteria
     */
    public function setFullName($fullName)
    {
        $this->full_name = $fullName;
    
        return $this;
    }

    /**
     * Get full_name
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->full_name;
    }


    /**
     * Set type
     *
     * @param string $type
     * @return Criteria
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }


    /**
     * Set cfamily
     *
     * @param \Business\OrganisationBundle\Entity\Cfamily $cfamily
     * @return Criteria
     */
    public function setCfamily(\Business\OrganisationBundle\Entity\Cfamily $cfamily)
    {
        $this->cfamily = $cfamily;
    
        return $this;
    }

    /**
     * Get cfamily
     *
     * @return \Business\OrganisationBundle\Entity\Cfamily 
     */
    public function getCfamily()
    {
        return $this->cfamily;
    }
}