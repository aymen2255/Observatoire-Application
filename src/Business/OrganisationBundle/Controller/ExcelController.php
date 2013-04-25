<?php

namespace Business\OrganisationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Business\OrganisationBundle\Entity\Organisation;

class ExcelController extends Controller {

    public function indexAction() {
    
           return $this->render('BusinessOrganisationBundle:Excel:index.html.twig');
       
    }
   

    public function uploadAction() {
        $filename = 'file/contacts.xlsx';
        
            $excelObj = $this->get('xls.load_xls2007')->load($filename);
            
            $nbr_ligne = $excelObj->getActiveSheet()->getHighestRow();
            for ($i = 3; $i <= $nbr_ligne; $i++) {
                $organisation = new Organisation();
                $organisation->setId($excelObj->getActiveSheet()->getCellByColumnAndRow(0, $i)->getValue());
                $organisation->setName($excelObj->getActiveSheet()->getCellByColumnAndRow(1, $i)->getValue());
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($organisation);
                $em->flush();
            }
            
        
        return $this->redirect($this->generateUrl('organisation'));
    }

}