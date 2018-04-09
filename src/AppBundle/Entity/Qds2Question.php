<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qds2Question
 *
 * @ORM\Table(name="qds2_question", indexes={@ORM\Index(name="FK_question_block", columns={"idBlock"})})
 * @ORM\Entity
 */
class Qds2Question
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idBlock", type="integer", nullable=false)
     */
    private $idblock;

    /**
     * @var string
     *
     * @ORM\Column(name="questionHeader", type="string", length=200, nullable=false)
     */
    private $questionheader;

    /**
     * @var string
     *
     * @ORM\Column(name="questionTitle", type="string", length=200, nullable=false)
     */
    private $questiontitle;

    /**
     * @var string
     *
     * @ORM\Column(name="questionType", type="string", length=10, nullable=false)
     */
    private $questiontype;

    /**
     * @var string
     *
     * @ORM\Column(name="questionChoice", type="string", length=500, nullable=false)
     */
    private $questionchoice;

    /**
     * @var boolean
     *
     * @ORM\Column(name="questionMandatory", type="boolean", nullable=false)
     */
    private $questionmandatory = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="questionOrder", type="integer", nullable=false)
     */
    private $questionorder;

    /**
     * @var integer
     *
     * @ORM\Column(name="questionVisible", type="integer", nullable=false)
     */
    private $questionvisible;

    /**
     * @var string
     *
     * @ORM\Column(name="responseId", type="string", length=5, nullable=false)
     */
    private $responseid;

    /**
     * @var integer
     *
     * @ORM\Column(name="idQuestion", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idquestion;


    public function getIdblock(){
        return $this->idblock;
    }

    public function setIdblock($idblock){
        $this->idblock = $idblock;
    }

    public function getQuestionheader(){
        return $this->questionheader;
    }

    public function setQuestionheader($questionheader){
        $this->questionheader = $questionheader;
    }

    public function getQuestiontitle(){
        return $this->questiontitle;
    }

    public function setQuestiontitle($questiontitle){
        $this->questiontitle = $questiontitle;
    }

    public function getQuestiontype(){
        return $this->questiontype;
    }

    public function setQuestiontype($questiontype){
        $this->questiontype = $questiontype;
    }

    public function getQuestionchoice(){
        return $this->questionchoice;
    }

    public function setQuestionchoice($questionchoice){
        $this->questionchoice = $questionchoice;
    }

    public function getQuestionmandatory(){
        return $this->questionmandatory;
    }

    public function setQuestionmandatory($questionmandatory){
        $this->questionmandatory = $questionmandatory;
    }

    public function getQuestionorder(){
        return $this->questionorder;
    }

    public function setQuestionorder($questionorder){
        $this->questionorder = $questionorder;
    }

    public function getQuestionvisible(){
        return $this->questionvisible;
    }

    public function setQuestionvisible($questionvisible){
        $this->questionvisible = $questionvisible;
    }

    public function getResponseid(){
        return $this->responseid;
    }

    public function setResponseid($responseid){
        $this->responseid = $responseid;
    }

    public function getIdquestion(){
        return $this->idquestion;
    }

    public function setIdquestion($idquestion){
        $this->idquestion = $idquestion;
    }
}

