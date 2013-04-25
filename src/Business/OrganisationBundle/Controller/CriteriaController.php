<?php

namespace Business\OrganisationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Business\OrganisationBundle\Entity\Criteria;
use Business\OrganisationBundle\Form\CriteriaType;

/**
 * Criteria controller.
 *
 */
class CriteriaController extends Controller
{
    /**
     * Lists all Criteria entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BusinessOrganisationBundle:Criteria')->findAll();

        return $this->render('BusinessOrganisationBundle:Criteria:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Criteria entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BusinessOrganisationBundle:Criteria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Criteria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BusinessOrganisationBundle:Criteria:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Criteria entity.
     *
     */
    public function newAction()
    {
        $entity = new Criteria();
        $form   = $this->createForm(new CriteriaType(), $entity);

        return $this->render('BusinessOrganisationBundle:Criteria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Criteria entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Criteria();
        $form = $this->createForm(new CriteriaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('criteria_show', array('id' => $entity->getId())));
        }

        return $this->render('BusinessOrganisationBundle:Criteria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Criteria entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BusinessOrganisationBundle:Criteria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Criteria entity.');
        }

        $editForm = $this->createForm(new CriteriaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BusinessOrganisationBundle:Criteria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Criteria entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BusinessOrganisationBundle:Criteria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Criteria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CriteriaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('criteria_edit', array('id' => $id)));
        }

        return $this->render('BusinessOrganisationBundle:Criteria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Criteria entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BusinessOrganisationBundle:Criteria')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Criteria entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('criteria'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
