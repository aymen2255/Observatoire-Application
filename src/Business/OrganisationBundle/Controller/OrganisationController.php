<?php

namespace Business\OrganisationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Business\OrganisationBundle\Entity\Organisation;
use Business\OrganisationBundle\Form\OrganisationType;

/**
 * Organisation controller.
 *
 */
class OrganisationController extends Controller
{
    /**
     * Lists all Organisation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BusinessOrganisationBundle:Organisation')->findAll();

        return $this->render('BusinessOrganisationBundle:Organisation:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Organisation entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BusinessOrganisationBundle:Organisation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Organisation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BusinessOrganisationBundle:Organisation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Organisation entity.
     *
     */
    public function newAction()
    {
        $entity = new Organisation();
        $form   = $this->createForm(new OrganisationType(), $entity);

        return $this->render('BusinessOrganisationBundle:Organisation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Organisation entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Organisation();
        $form = $this->createForm(new OrganisationType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('organisation_show', array('id' => $entity->getId())));
        }

        return $this->render('BusinessOrganisationBundle:Organisation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Organisation entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BusinessOrganisationBundle:Organisation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Organisation entity.');
        }

        $editForm = $this->createForm(new OrganisationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BusinessOrganisationBundle:Organisation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Organisation entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BusinessOrganisationBundle:Organisation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Organisation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new OrganisationType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('organisation_edit', array('id' => $id)));
        }

        return $this->render('BusinessOrganisationBundle:Organisation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Organisation entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BusinessOrganisationBundle:Organisation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Organisation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('organisation'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
