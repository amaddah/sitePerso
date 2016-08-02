<?php

namespace AMBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AMBundle\Entity\Experience;
use AMBundle\Form\ExperienceType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Experience controller.
 *
 * @Route("/experience")
 */
class ExperienceController extends Controller
{
    /**
     * Lists all Experience entities.
     *
     * @Route("/", name="experience_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $experiences = $em->getRepository('AMBundle:Experience')->findAll();

        return array(
            'experiences' => $experiences,
        );
    }

    /**
     * Creates a new Experience entity.
     *
     * @Route("/new", name="experience_new")
     * @Method({"GET", "POST"})
     * @Template()
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function newAction(Request $request)
    {
        //$this->get('am.gestionAcces')->checkAcces();

        $experience = new Experience();
        $form = $this->createForm('AMBundle\Form\ExperienceType', $experience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($experience);
            $em->flush();

            return $this->redirectToRoute('experience_index');
        }

        return array(
            'experience' => $experience,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Experience entity.
     *
     * @Route("/{id}", name="experience_show")
     * @Method("GET")
     * @Template()
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function showAction(Experience $experience)
    {
        $deleteForm = $this->createDeleteForm($experience);

        return array(
            'experience' => $experience,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Experience entity.
     *
     * @Route("/{id}/edit", name="experience_edit")
     * @Method({"GET", "POST"})
     * @Template()
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction(Request $request, Experience $experience)
    {
        $deleteForm = $this->createDeleteForm($experience);
        $editForm = $this->createForm('AMBundle\Form\ExperienceType', $experience);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($experience);
            $em->flush();

            return $this->redirectToRoute('experience_index');
        }

        return array(
            'experience' => $experience,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Experience entity.
     *
     * @Route("/{id}", name="experience_delete")
     * @Method("DELETE")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction(Request $request, Experience $experience)
    {
        $form = $this->createDeleteForm($experience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($experience);
            $em->flush();
        }

        return $this->redirectToRoute('experience_index');
    }

    /**
     * Creates a form to delete a Experience entity.
     *
     * @param Experience $experience The Experience entity
     *
     * @return \Symfony\Component\Form\Form The form
     * @Security("has_role('ROLE_ADMIN')")
     */
    private function createDeleteForm(Experience $experience)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('experience_delete', array('id' => $experience->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
