<?php

namespace AppBundle\Controller;

use AppBundle\Entity\QuestionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Questiontype controller.
 *
 * @Route("test/type")
 */
class QuestionTypeController extends Controller
{
    /**
     * Lists all questionType entities.
     *
     * @Route("/", name="test_type_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $questionTypes = $em->getRepository('AppBundle:QuestionType')->findAll();

        return $this->render("@App/questiontype/index.html.twig", array(
            'questionTypes' => $questionTypes,
        ));
    }

    /**
     * Creates a new questionType entity.
     *
     * @Route("/new", name="test_type_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $questionType = new Questiontype();
        $form = $this->createForm('AppBundle\Form\QuestionTypeType', $questionType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($questionType);
            $em->flush();

            return $this->redirectToRoute('test_type_show', array('id' => $questionType->getId()));
        }

        return $this->render('@App/questiontype/new.html.twig', array(
            'questionType' => $questionType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a questionType entity.
     *
     * @Route("/{id}", name="test_type_show")
     * @Method("GET")
     */
    public function showAction(QuestionType $questionType)
    {
        $deleteForm = $this->createDeleteForm($questionType);

        return $this->render('@App/questiontype/show.html.twig', array(
            'questionType' => $questionType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing questionType entity.
     *
     * @Route("/{id}/edit", name="test_type_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, QuestionType $questionType)
    {
        $deleteForm = $this->createDeleteForm($questionType);
        $editForm = $this->createForm('AppBundle\Form\QuestionTypeType', $questionType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('test_type_edit', array('id' => $questionType->getId()));
        }

        return $this->render('@App/questiontype/edit.html.twig', array(
            'questionType' => $questionType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a questionType entity.
     *
     * @Route("/{id}", name="test_type_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, QuestionType $questionType)
    {
        $form = $this->createDeleteForm($questionType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($questionType);
            $em->flush();
        }

        return $this->redirectToRoute('test_type_index');
    }

    /**
     * Creates a form to delete a questionType entity.
     *
     * @param QuestionType $questionType The questionType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(QuestionType $questionType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('test_type_delete', array('id' => $questionType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
