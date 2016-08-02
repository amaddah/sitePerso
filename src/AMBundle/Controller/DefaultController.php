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
        $contact = new Contact();
        $form = $this->createForm('AMBundle\Form\ContactType', $contact, array(
            'action' => $this->generateUrl('index', array()),
            'method' => 'POST',
        ));
        $form->add('submit', SubmitType::class, [
            'label' => 'Valider',
            'attr' => [
                'class' => 'btn btn-default col-sm-offset-3'
                ]
            ]);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $this->redirectToRoute('contact_index');
        }

        return array(
            'contact' => $contact,
            'form' => $form->createView(),
        );
    }

    /**
     * @Route("/cv", name="cv_index")
     * @Template
     */
    public function cvAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm('AMBundle\Form\ContactType', $contact, array(
            'action' => $this->generateUrl('cv_index', array()),
            'method' => 'POST',
        ));
        $form->add('submit', SubmitType::class, [
            'label' => 'Valider',
            'attr' => [
                'class' => 'btn btn-default col-sm-offset-3'
            ]
        ]);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $this->redirectToRoute('contact_index');
        }

        return array(
            'contact' => $contact,
            'form' => $form->createView(),
        );
    }
}
