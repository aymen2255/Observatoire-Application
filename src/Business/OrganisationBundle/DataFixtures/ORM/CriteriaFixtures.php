<?php
// src/Blogger/BlogBundle/DataFixtures/ORM/BlogFixtures.php

namespace Business\OrganisationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Business\OrganisationBundle\Entity\Criteria;
use Business\OrganisationBundle\Entity\Cfamily;

class CriteriaFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $criteria1 = new Criteria();
        $criteria1->setCfamily($manager->merge($this->getReference('cfamily-1')));
        $criteria1->setName('collectivité territoriale');
        $criteria1->setFullName('Type de structure partenaire (collectivité territoriale, entreprise, administration, association, autre à préciser)');
        $criteria1->setType('type 1');
        $manager->persist($criteria1);

        $criteria2 = new Criteria();
        $criteria2->setCfamily($manager->merge($this->getReference('cfamily-1')));
        $criteria2->setName('Nbr Communes');
        $criteria2->setFullName('Si collectivité, nombre de communes de la collectivité');
        $criteria2->setType('type 1');
        $manager->persist($criteria2);

        $criteria3 = new Criteria();
        $criteria3->setCfamily($manager->merge($this->getReference('cfamily-2')));
        $criteria3->setName('rural');
        $criteria3->setFullName('Type de milieu du territoire (rural, à dominante rurale, à dominante urbaine, urbain)');
        $criteria3->setType('type 2');
        $manager->persist($criteria3);

        $criteria4 = new Criteria();
        $criteria4->setCfamily($manager->merge($this->getReference('cfamily-2')));
        $criteria4->setName('contrat');
        $criteria4->setFullName('Relation avec la structure : contrat, convention, marché, pas de contractualisation, autre à préciser');
        $criteria4->setType('type 3');
        $manager->persist($criteria4);
        
        $criteria5 = new Criteria();
        $criteria5->setCfamily($manager->merge($this->getReference('cfamily-1')));
        $criteria5->setName('financier');
        $criteria5->setFullName('Volet financier du partenariat (montant de la prestation)');
        $criteria5->setType('type 3');
        $manager->persist($criteria5);       
        
        
        $manager->flush();
        
    }
    
        public function getOrder()
    {
        return 3;
    }

}