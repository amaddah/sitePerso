<?php

namespace AMBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AMBundle\Entity\Formation;
use AMBundle\Form\FormationType;

/**
 * Formation controller.
 *
 * @Route("/Formation")
 */
class FormationController extends Controller
{
    /**
     * Lists all Formation entities.
     *
     * @Route("/", name="formation_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $formations = $em->getRepository('AMBundle:Formation')->findAll();

        return array(
            'formations' => $formations,
        );
    }

    /**
     * Creates a new Formation entity.
     *
     * @Route("/new", name="formation_new")
     * @Method({"GET", "POST"})
     * @Template()
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function newAction(Request $request)
    {
        $formation = new Formation();
        $form = $this->createForm('AMBundle\Form\FormationType', $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();

            return $this->redirectToRoute('formation_index');
        }

        return array(
            'formation' => $formation,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Formation entity.
     *
     * @Route("/{id}", name="formation_show")
     * @Method("GET")
     * @Template()
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function showAction(Formation $formation)
    {
        $deleteForm = $this->createDeleteForm($formation);

        return array(
            'formation' => $formation,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Formation entity.
     *
     * @Route("/{id}/edit", name="formation_edit")
     * @Method({"GET", "POST"})
     * @Template()
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction(Request $request, Formation $formation)
    {
        $deleteForm = $this->createDeleteForm($formation);
        $editForm = $this->createForm('AMBundle\Form\FormationType', $formation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();

            return $this->redirectToRoute('formation_index');
        }

        return array(
            'formation' => $formation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Formation entity.
     *
     * @Route("/{id}", name="formation_delete")
     * @Method("DELETE")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction(Request $request, Formation $formation)
    {
        $form = $this->createDeleteForm($formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($formation);
            $em->flush();
        }

        return $this->redirectToRoute('formation_index');
    }

    /**
     * Creates a form to delete a Formation entity.
     *
     * @param Formation $formation The Formation entity
     *
     * @return \Symfony\Component\Form\Form The form
     * @Security("has_role('ROLE_ADMIN')")
     */
    private function createDeleteForm(Formation $formation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formation_delete', array('id' => $formation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
