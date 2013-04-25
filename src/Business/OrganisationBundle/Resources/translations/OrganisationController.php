<?php

namespace Business\OrganisationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrganisationController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BusinessOrganisationBundle:Organisation:index.html.twig', array('name' => $name));
    }
}
