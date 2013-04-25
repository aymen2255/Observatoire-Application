<?php
// src/Blogger/BlogBundle/DataFixtures/ORM/BlogFixtures.php

namespace Business\OrganisationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Business\OrganisationBundle\Entity\Cfamily;

class CfamilyFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cfamily1 = new Cfamily('1');
        $cfamily1->setName('Identification de la structure');
        $manager->persist($cfamily1);

        $cfamily2 = new Cfamily('2');
        $cfamily2->setName('partenaires');
        $manager->persist($cfamily2);

        
        
        $manager->flush();
        
        $this->addReference('cfamily-1', $cfamily1);
        $this->addReference('cfamily-2', $cfamily2);       
        
        
    }
    
        public function getOrder()
    {
        return 2;
    }

}