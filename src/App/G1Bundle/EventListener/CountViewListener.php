<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 11/9/14
 * Time: 6:49 PM
 */

namespace App\G1Bundle\EventListener;

use JMS\DiExtraBundle\Annotation as DI;
use App\G1Bundle\Event\ArtWorkEvent;
use Doctrine\ORM\EntityManager;

/**
 * @DI\Service()
 */
class CountViewListener
{
    private $em;

    /**
     * @DI\InjectParams({"em"=@DI\Inject("doctrine.orm.entity_manager")})
     */
    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @DI\Observe(ArtWorkEvent::COUNT_VIEW)
     */
    public function onCountView(ArtWorkEvent $event)
    {
        $artWork = $event->getArtWork();
        $artWork->setViews($artWork->getViews() + 1);
        $this->em->persist($artWork);
        $this->em->flush();
    }
} 