<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qds2Block
 *
 * @ORM\Table(name="qds2_block", indexes={@ORM\Index(name="FK_block_step", columns={"idStep"})})
 * @ORM\Entity
 */
class Qds2Block
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idStep", type="integer", nullable=false)
     */
    private $idstep;

    /**
     * @var string
     *
     * @ORM\Column(name="blockTitle", type="string", length=100, nullable=false)
     */
    private $blocktitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="blockMultiple", type="integer", nullable=false)
     */
    private $blockmultiple;

    /**
     * @var integer
     *
     * @ORM\Column(name="blockOrder", type="integer", nullable=false)
     */
    private $blockorder;

    /**
     * @var integer
     *
     * @ORM\Column(name="idBlock", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idblock;

    public function getIdstep(){
        return $this->idstep;
    }

    public function setIdstep($idstep){
        $this->idstep = $idstep;
    }

    public function getBlocktitle(){
        return $this->blocktitle;
    }

    public function setBlocktitle($blocktitle){
        $this->blocktitle = $blocktitle;
    }

    public function getBlockmultiple(){
        return $this->blockmultiple;
    }

    public function setBlockmultiple($blockmultiple){
        $this->blockmultiple = $blockmultiple;
    }

    public function getBlockorder(){
        return $this->blockorder;
    }

    public function setBlockorder($blockorder){
        $this->blockorder = $blockorder;
    }

    public function getIdblock(){
        return $this->idblock;
    }

    public function setIdblock($idblock){
        $this->idblock = $idblock;
    }


}

