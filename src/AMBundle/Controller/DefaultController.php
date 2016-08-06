<?php

namespace AMBundle\Controller;

use AMBundle\Entity\Contact;
use AMBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template
     */
    public function indexAction(Request $request)
    {
        return $this->contactAction($request, 'index');
    }

    /**
     * @Route("/cv", name="cv_index")
     * @Template
     */
    public function cvAction(Request $request)
    {
        return $this->contactAction($request, 'cv_index');
    }

    /**
     * @param Request $request
     * @param $route
     * @return array
     */
    public function contactAction(Request $request, $route)
    {
        $contact = new Contact();
        $form = $this->newFormContactAction($contact, $route);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            unset($contact);
            unset($form);
            $contact = new Contact();
            $form = $this->newFormContactAction($contact, $route);

            $str_s = 'Votre demande de contact a bien été reçu.';
            $request
                ->getSession()
                ->getFlashBag()
                ->add('success', $str_s);

            $this->redirectToRoute($route);
        }

        return array(
            'contact' => $contact,
            'form' => $form->createView(),
        );
    }

    /**
     * @param $contact
     * @param $route
     * @return \Symfony\Component\Form\Form
     */
    public function newFormContactAction($contact, $route){
        $form = $this->createForm('AMBundle\Form\ContactType', $contact, array(
            'action' => $this->generateUrl($route, array()),
            'method' => 'POST',
        ));
        $form->add('submit', SubmitType::class, [
            'label' => 'Valider',
            'attr' => [
                'class' => 'btn btn-default col-sm-offset-3'
            ]
        ]);
        return $form;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function showExceptionAction(){
        return $this->redirectToRoute('index');
    }
}
