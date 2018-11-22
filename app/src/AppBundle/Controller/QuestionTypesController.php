<?php

namespace AppBundle\Controller;

use AppBundle\Entity\QuestionTypes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Questiontype controller.
 *
 * @Route("test/types")
 */
class QuestionTypesController extends Controller
{
    /**
     * Lists all questionType entities.
     *
     * @Route("/", name="test_types_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $questionTypes = $em->getRepository('AppBundle:QuestionTypes')->findAll();

        return $this->render('@App/questiontypes/index.html.twig', array(
            'questionTypes' => $questionTypes,
        ));
    }

    /**
     * Creates a new questionType entity.
     *
     * @Route("/new", name="test_types_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $questionType = new Questiontype();
        $form = $this->createForm('AppBundle\Form\QuestionTypesType', $questionType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($questionType);
            $em->flush();

            return $this->redirectToRoute('test_types_show', array('id' => $questionType->getId()));
        }

        return $this->render('@App/questiontypes/new.html.twig', array(
            'questionType' => $questionType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a questionType entity.
     *
     * @Route("/{id}", name="test_types_show")
     * @Method("GET")
     */
    public function showAction(QuestionTypes $questionType)
    {
        $deleteForm = $this->createDeleteForm($questionType);

        return $this->render('@App/questiontypes/show.html.twig', array(
            'questionType' => $questionType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing questionType entity.
     *
     * @Route("/{id}/edit", name="test_types_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, QuestionTypes $questionType)
    {
        $deleteForm = $this->createDeleteForm($questionType);
        $editForm = $this->createForm('AppBundle\Form\QuestionTypesType', $questionType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('test_types_edit', array('id' => $questionType->getId()));
        }

        return $this->render('@App/questiontypes/edit.html.twig', array(
            'questionType' => $questionType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a questionType entity.
     *
     * @Route("/{id}", name="test_types_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, QuestionTypes $questionType)
    {
        $form = $this->createDeleteForm($questionType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($questionType);
            $em->flush();
        }

        return $this->redirectToRoute('test_types_index');
    }

    /**
     * Creates a form to delete a questionType entity.
     *
     * @param QuestionTypes $questionType The questionType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(QuestionTypes $questionType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('test_types_delete', array('id' => $questionType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
