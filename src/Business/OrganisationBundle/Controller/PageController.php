<?php

namespace Business\OrganisationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Business\OrganisationBundle\Entity\Document;

class PageController extends Controller
{
        public function indexAction() {
        

        $document = new Document();
        $form = $this->createFormBuilder($document)
        ->add('name')
        ->add('file')
        ->getForm()
    ;

    if ($this->getRequest()->isMethod('POST')) {
        $form->bind($this->getRequest());
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $document->upload();
            $em->persist($document);
            $em->flush();

            $this->redirect($this->generateUrl('organisation'));
        }
    }

    return $this->render('BusinessOrganisationBundle:Page:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    


}