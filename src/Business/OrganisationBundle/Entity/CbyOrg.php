<?php

namespace Business\OrganisationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CbyOrg
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Business\OrganisationBundle\Entity\CbyOrgRepository")
 */
class CbyOrg
{


    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Business\OrganisationBundle\Entity\Criteria")
     */
    private $criteria;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Business\OrganisationBundle\Entity\Organisation")
     */
    private $organisation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime")
     */
    private $start_date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime")
     */
    private $end_date;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;


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
     * Set start_date
     *
     * @param \DateTime $startDate
     * @return CbyOrg
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;
    
        return $this;
    }

    /**
     * Get start_date
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set end_date
     *
     * @param \DateTime $endDate
     * @return CbyOrg
     */
    public function setEndDate($endDate)
    {
        $this->end_date = $endDate;
    
        return $this;
    }

    /**
     * Get end_date
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return CbyOrg
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set criteria
     *
     * @param \Business\OrganisationBundle\Entity\Criteria $criteria
     * @return CbyOrg
     */
    public function setCriteria(\Business\OrganisationBundle\Entity\Criteria $criteria)
    {
        $this->criteria = $criteria;
    
        return $this;
    }

    /**
     * Get criteria
     *
     * @return \Business\OrganisationBundle\Entity\Criteria 
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * Set organisation
     *
     * @param \Business\OrganisationBundle\Entity\Organisation $organisation
     * @return CbyOrg
     */
    public function setOrganisation(\Business\OrganisationBundle\Entity\Organisation $organisation)
    {
        $this->organisation = $organisation;
    
        return $this;
    }

    /**
     * Get organisation
     *
     * @return \Business\OrganisationBundle\Entity\Organisation 
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }
}