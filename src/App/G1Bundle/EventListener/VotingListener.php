<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 11/9/14
 * Time: 8:49 PM
 */

namespace App\G1Bundle\EventListener;

use Doctrine\ORM\EntityManager;
use JMS\DiExtraBundle\Annotation as DI;
use App\G1Bundle\Event\ArtWorkEvent;

/**
 * @DI\Service()
 */
class VotingListener {

    private $em;

    /**
     * @DI\InjectParams({"em"=@DI\Inject("doctrine.orm.entity_manager")})
     */
    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @DI\Observe(ArtWorkEvent::UP_VOTE)
     */
    public function onUpVote(ArtWorkEvent $event)
    {
        $artWork = $event->getArtWork();
        $artWork->setUpVotes($artWork->getUpVotes() + 1);
        $this->em->persist($artWork);
        $this->em->flush();
    }

    /**
     * @DI\Observe(ArtWorkEvent::DWN_VOTE)
     */
    public function onDwnVote(ArtWorkEvent $event)
    {
        $artWork = $event->getArtWork();
        $artWork->setDwnVotes($artWork->getDwnVotes() + 1);
        $this->em->persist($artWork);
        $this->em->flush();
    }
} 