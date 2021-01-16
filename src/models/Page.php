<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pages")
 */
class Page {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */

    private $title;
    /**
     * @ORM\Column(type="string")
     */
    private $contents;

    public function getID() {
        return $this->id;
    }
    public function getContents() {
        return $this->contents;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }

    public function setContents($contents) {
        $this->contents = $contents;
    }



}