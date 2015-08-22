<?php

namespace AchaMeuPet\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AchaMeuPet\CoreBundle\Entity\Pet;
use AchaMeuPet\CoreBundle\Form\PetType;

/**
 * Pet controller.
 *
 */
class PetController extends Controller
{

    /**
     * Lists all Pet entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AchaMeuPetCoreBundle:Pet')->findAll();

        return $this->render('AchaMeuPetCoreBundle:Pet:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Pet entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Pet();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pet_show', array('id' => $entity->getId())));
        }

        return $this->render('AchaMeuPetCoreBundle:Pet:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Pet entity.
     *
     * @param Pet $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pet $entity)
    {
        $form = $this->createForm(new PetType(), $entity, array(
            'action' => $this->generateUrl('pet_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pet entity.
     *
     */
    public function newAction()
    {
        $entity = new Pet();
        $form   = $this->createCreateForm($entity);

        return $this->render('AchaMeuPetCoreBundle:Pet:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pet entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AchaMeuPetCoreBundle:Pet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AchaMeuPetCoreBundle:Pet:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pet entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AchaMeuPetCoreBundle:Pet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pet entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AchaMeuPetCoreBundle:Pet:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Pet entity.
    *
    * @param Pet $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pet $entity)
    {
        $form = $this->createForm(new PetType(), $entity, array(
            'action' => $this->generateUrl('pet_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pet entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AchaMeuPetCoreBundle:Pet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pet_edit', array('id' => $id)));
        }

        return $this->render('AchaMeuPetCoreBundle:Pet:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Pet entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AchaMeuPetCoreBundle:Pet')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pet entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pet'));
    }

    /**
     * Creates a form to delete a Pet entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pet_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
