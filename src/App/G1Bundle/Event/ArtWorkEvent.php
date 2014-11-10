<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 11/9/14
 * Time: 6:45 PM
 */

namespace App\G1Bundle\Event;

use App\G1Bundle\Entity\ArtWork;
use Symfony\Component\EventDispatcher\Event;

class ArtWorkEvent extends Event {

    const COUNT_VIEW = 'artwork.count_view';
    const UP_VOTE = 'artwork.up_vote';
    const DWN_VOTE = 'artwork.dwn_vote';

    private $artWork;

    public function __construct(ArtWork $artWork)
    {
        $this->artWork = $artWork;
    }

    public function getArtWork()
    {
        return $this->artWork;
    }
} 