<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Poll;
use AppBundle\Entity\Questions;
use AppBundle\Repository\QuestionsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Poll controller.
 *
 * @Route("poll")
 */
class PollController extends Controller
{
    /**
     * Lists all poll entities.
     *
     * @Route("/", name="poll_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $polls = $em->getRepository('AppBundle:Poll')->findAll();

        return $this->render('@App/poll/index.html.twig', array(
            'polls' => $polls,
        ));
    }

    /**
     * Creates a new poll entity.
     *
     * @Route("/new", name="poll_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $poll = new Poll();
        $form = $this->createForm('AppBundle\Form\PollType', $poll);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->container->get('security.context')->getToken()->getUser();
            $poll->setOwnerId($user->getId());
            $em = $this->getDoctrine()->getManager();


            foreach ($poll->getQuestions() as $question){
                $question->setQuestion($poll);
                foreach ($question->getQuestionItems() as $item){
                    $item->setQuestion($question);
                }
            }
            dump($poll);



            $em->persist($poll);
            $em->flush();
            return $this->redirectToRoute('poll_show', array('id' => $poll->getId()));
        }

        return $this->render('@App/poll/new.html.twig', array(
            'poll' => $poll,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a poll entity.
     *
     * @Route("/{id}", name="poll_show")
     * @Method("GET")
     */
    public function showAction(Poll $poll)
    {
        $deleteForm = $this->createDeleteForm($poll);
//        $em = $this->getDoctrine()->getManager();
//        $poll=$em->getRepository(Poll::class)->find($poll);
//        $poll->setQuestions($questions);

//        $questions = $poll->getQuestions();
        dump($poll->getQuestions());
        die();
        return $this->render('@App/poll/show.html.twig', array(
            'poll' => $poll,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing poll entity.
     *
     * @Route("/{id}/edit", name="poll_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Poll $poll)
    {
        $deleteForm = $this->createDeleteForm($poll);
        $editForm = $this->createForm('AppBundle\Form\PollType', $poll);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('poll_edit', array('id' => $poll->getId()));
        }

        return $this->render('@App/poll/edit.html.twig', array(
            'poll' => $poll,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a poll entity.
     *
     * @Route("/{id}", name="poll_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Poll $poll)
    {
        $form = $this->createDeleteForm($poll);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($poll);
            $em->flush();
        }

        return $this->redirectToRoute('poll_index');
    }

    /**
     * Creates a form to delete a poll entity.
     *
     * @param Poll $poll The poll entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Poll $poll)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('poll_delete', array('id' => $poll->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
