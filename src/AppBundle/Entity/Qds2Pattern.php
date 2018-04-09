<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qds2Pattern
 *
 * @ORM\Table(name="qds2_pattern")
 * @ORM\Entity
 */
class Qds2Pattern
{
    /**
     * @var string
     *
     * @ORM\Column(name="qdsPattern", type="string", length=10, nullable=false)
     */
    private $qdspattern;

    /**
     * @var string
     *
     * @ORM\Column(name="qdsTitle", type="string", length=50, nullable=false)
     */
    private $qdstitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="idPattern", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpattern;

    public function getQdspattern(){
        return $this->qdspattern;
    }

    public function setQdspattern($qdspattern){
        $this->qdspattern = $qdspattern;
    }

    public function getQdstitle(){
        return $this->qdstitle;
    }

    public function setQdstitle($qdstitle){
        $this->qdstitle = $qdstitle;
    }

    public function getIdpattern(){
        return $this->idpattern;
    }

    public function setIdpattern($idpattern){
        $this->idpattern = $idpattern;
    }
}

