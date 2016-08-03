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
}
