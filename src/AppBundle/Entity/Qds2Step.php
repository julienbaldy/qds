<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qds2Step
 *
 * @ORM\Table(name="qds2_step", indexes={@ORM\Index(name="FK_step_pattern", columns={"idPattern"})})
 * @ORM\Entity
 */
class Qds2Step
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPattern", type="integer", nullable=false)
     */
    private $idpattern;

    /**
     * @var string
     *
     * @ORM\Column(name="stepTitle", type="string", length=50, nullable=false)
     */
    private $steptitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="stepOrder", type="integer", nullable=false)
     */
    private $steporder;

    /**
     * @var integer
     *
     * @ORM\Column(name="idStep", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idstep;

    public function getIdpattern(){
        return $this->idpattern;
    }

    public function setIdpattern($idpattern){
        $this->idpattern = $idpattern;
    }

    public function getSteptitle(){
        return $this->steptitle;
    }

    public function setSteptitle($steptitle){
        $this->steptitle = $steptitle;
    }

    public function getSteporder(){
        return $this->steporder;
    }

    public function setSteporder($steporder){
        $this->steporder = $steporder;
    }

    public function getIdstep(){
        return $this->idstep;
    }

    public function setIdstep($idstep){
        $this->idstep = $idstep;
    }
}

