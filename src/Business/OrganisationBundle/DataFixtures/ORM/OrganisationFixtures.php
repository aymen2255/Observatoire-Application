<?php
// src/Blogger/BlogBundle/DataFixtures/ORM/BlogFixtures.php

namespace Business\OrganisationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Business\OrganisationBundle\Entity\Organisation;

class OrganisationFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $organisation1 = new Organisation();
        $organisation1->setId('316581909');
        $organisation1->setName('Conseil général du Doubs');
        $manager->persist($organisation1);

        $organisation2 = new Organisation();
        $organisation2->setId('528041312');
        $organisation2->setName('Syctom');
        $manager->persist($organisation2);

        $organisation3 = new Organisation();
        $organisation3->setId('448609016');
        $organisation3->setName('Eco-Systèmes');
        $manager->persist($organisation3);

        $organisation4 = new Organisation();
        $organisation4->setId('412141517');
        $organisation4->setName('Le Relais');
        $manager->persist($organisation4);
        
        $organisation5 = new Organisation();
        $organisation5->setId('409716750');
        $organisation5->setName('HLM');
        $manager->persist($organisation5);       
        
        
        $manager->flush();
        
        
        $this->addReference('organisation-1', $organisation1);
        $this->addReference('organisation-2', $organisation2);
        $this->addReference('organisation-3', $organisation3);
        $this->addReference('organisation-4', $organisation4);
        $this->addReference('organisation-5', $organisation5);
        
    }
    
        public function getOrder()
    {
        return 1;
    }

}