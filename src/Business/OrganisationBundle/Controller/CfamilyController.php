<?php

namespace Business\OrganisationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Business\OrganisationBundle\Entity\Cfamily;
use Business\OrganisationBundle\Form\CfamilyType;

/**
 * Cfamily controller.
 *
 */
class CfamilyController extends Controller
{
    /**
     * Lists all Cfamily entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BusinessOrganisationBundle:Cfamily')->findAll();

        return $this->render('BusinessOrganisationBundle:Cfamily:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Cfamily entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BusinessOrganisationBundle:Cfamily')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cfamily entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BusinessOrganisationBundle:Cfamily:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Cfamily entity.
     *
     */
    public function newAction()
    {
        $entity = new Cfamily();
        $form   = $this->createForm(new CfamilyType(), $entity);

        return $this->render('BusinessOrganisationBundle:Cfamily:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Cfamily entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Cfamily();
        $form = $this->createForm(new CfamilyType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cfamily_show', array('id' => $entity->getId())));
        }

        return $this->render('BusinessOrganisationBundle:Cfamily:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cfamily entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BusinessOrganisationBundle:Cfamily')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cfamily entity.');
        }

        $editForm = $this->createForm(new CfamilyType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BusinessOrganisationBundle:Cfamily:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Cfamily entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BusinessOrganisationBundle:Cfamily')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cfamily entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CfamilyType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cfamily_edit', array('id' => $id)));
        }

        return $this->render('BusinessOrganisationBundle:Cfamily:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cfamily entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BusinessOrganisationBundle:Cfamily')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cfamily entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cfamily'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
