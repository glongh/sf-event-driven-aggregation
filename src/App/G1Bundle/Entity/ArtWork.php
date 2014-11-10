<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 11/9/14
 * Time: 1:50 PM
 */

namespace App\G1Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ArtWork
 * @ORM\Table(name="artwork")
 * @ORM\Entity(repositoryClass="App\G1Bundle\Entity\ArtWorkRepository")
 */
class ArtWork {

    /**
     * @var integer $id
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     * @ORM\Column(length=50)
     */
    private $name;

    /**
     * @var string $description
     * @ORM\Column(length=256)
     */
    private $description;

    /**
     * @var integer $views
     * @ORM\Column(type="integer", nullable=true)
     */
    private $views;

    /**
     * @var integer $upVotes
     * @ORM\Column(type="integer", nullable=true)
     */
    private $upVotes;

    /**
     * @var integer $dwnVotes
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dwnVotes;

    /**
     * @var boolean $featured
     * @ORM\Column(name="is_featured", type="boolean")
     */
    private $featured;


    function __construct($name = '', $description='')
    {
        $this->description = $description;
        $this->name = $name;
        $this->dwnVotes = 0;
        $this->upVotes = 0;
        $this->views = 0;
        $this->featured = false;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param int $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }

    /**
     * @return int
     */
    public function getUpVotes()
    {
        return $this->upVotes;
    }

    /**
     * @param int $upVotes
     */
    public function setUpVotes($upVotes)
    {
        $this->upVotes = $upVotes;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getDwnVotes()
    {
        return $this->dwnVotes;
    }

    /**
     * @param int $dwnVotes
     */
    public function setDwnVotes($dwnVotes)
    {
        $this->dwnVotes = $dwnVotes;
    }




} 