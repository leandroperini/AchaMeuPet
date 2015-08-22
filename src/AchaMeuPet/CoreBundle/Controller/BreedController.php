<?php

namespace AchaMeuPet\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AchaMeuPet\CoreBundle\Entity\Breed;
use AchaMeuPet\CoreBundle\Form\BreedType;

/**
 * Breed controller.
 *
 */
class BreedController extends Controller
{

    /**
     * Lists all Breed entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AchaMeuPetCoreBundle:Breed')->findAll();

        return $this->render('AchaMeuPetCoreBundle:Breed:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Breed entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Breed();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('breed_show', array('id' => $entity->getId())));
        }

        return $this->render('AchaMeuPetCoreBundle:Breed:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Breed entity.
     *
     * @param Breed $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Breed $entity)
    {
        $form = $this->createForm(new BreedType(), $entity, array(
            'action' => $this->generateUrl('breed_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Breed entity.
     *
     */
    public function newAction()
    {
        $entity = new Breed();
        $form   = $this->createCreateForm($entity);

        return $this->render('AchaMeuPetCoreBundle:Breed:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Breed entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AchaMeuPetCoreBundle:Breed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Breed entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AchaMeuPetCoreBundle:Breed:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Breed entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AchaMeuPetCoreBundle:Breed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Breed entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AchaMeuPetCoreBundle:Breed:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Breed entity.
    *
    * @param Breed $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Breed $entity)
    {
        $form = $this->createForm(new BreedType(), $entity, array(
            'action' => $this->generateUrl('breed_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Breed entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AchaMeuPetCoreBundle:Breed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Breed entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('breed_edit', array('id' => $id)));
        }

        return $this->render('AchaMeuPetCoreBundle:Breed:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Breed entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AchaMeuPetCoreBundle:Breed')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Breed entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('breed'));
    }

    /**
     * Creates a form to delete a Breed entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('breed_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
