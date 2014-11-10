<?php

namespace App\G1Bundle\Controller;

use App\G1Bundle\Entity\ArtWork;
use App\G1Bundle\Event\ArtWorkEvent;
use ClassesWithParents\A;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function indexAction()
    {
        $artwork = $this->getDoctrine()->getRepository('AppG1Bundle:ArtWork')->getLatest10();
        $featured = $this->getDoctrine()->getRepository('AppG1Bundle:ArtWork')->getFeatured();
        return array(
            'artwork' => $artwork ,
            'featured' => $featured
        );
    }

    /**
     * @Route("/show/{id}", name="show")
     * @ParamConverter("artwork", class="AppG1Bundle:ArtWork")
     * @Template()
     */
    public function showAction(ArtWork $artWork)
    {
        $this->get('event_dispatcher')->dispatch(ArtWorkEvent::COUNT_VIEW, new ArtWorkEvent($artWork));
        return array('artwork'=>$artWork);
    }

    /**
     * @Route("/show/{id}/upVote", name="show_upvote")
     * @ParamConverter("artwork", class="AppG1Bundle:ArtWork")
     */
    public function upVoteAction(ArtWork $artWork)
    {
        $this->get('event_dispatcher')->dispatch(ArtWorkEvent::UP_VOTE, new ArtWorkEvent($artWork));
        return $this->redirect($this->generateUrl('show', array('id'=>$artWork->getId())));
    }

    /**
     * @Route("/show/{id}/dwnVote", name="show_dwnvote")
     * @ParamConverter("artwork", class="AppG1Bundle:ArtWork")
     */
    public function dwnVoteAction(ArtWork $artWork)
    {
        $this->get('event_dispatcher')->dispatch(ArtWorkEvent::DWN_VOTE, new ArtWorkEvent($artWork));
        return $this->redirect($this->generateUrl('show', array('id'=>$artWork->getId())));
    }
}