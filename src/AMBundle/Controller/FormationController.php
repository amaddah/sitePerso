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
}
