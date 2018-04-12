<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qds2
 *
 * @ORM\Table(name="qds2")
 * @ORM\Entity
 */
class Qds2
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dtCreate", type="datetime", nullable=false)
     */
    private $dtcreate = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="num_pas", type="string", length=20, nullable=false)
     */
    private $numPas;

    /**
     * @var string
     *
     * @ORM\Column(name="num_dos", type="string", length=50, nullable=false)
     */
    private $numDos;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_pack_dates", type="integer", nullable=false)
     */
    private $idPackDates;

    /**
     * @var string
     *
     * @ORM\Column(name="qdsPattern", type="string", length=10, nullable=true)
     */
    private $qdspattern;

    /**
     * @var boolean
     *
     * @ORM\Column(name="publie", type="boolean", nullable=false)
     */
    private $publie = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="R01", type="integer", nullable=true)
     */
    private $r01;

    /**
     * @var integer
     *
     * @ORM\Column(name="R02", type="integer", nullable=true)
     */
    private $r02;

    /**
     * @var integer
     *
     * @ORM\Column(name="R03", type="integer", nullable=true)
     */
    private $r03;

    /**
     * @var string
     *
     * @ORM\Column(name="R04", type="string", length=1000, nullable=true)
     */
    private $r04;

    /**
     * @var string
     *
     * @ORM\Column(name="R05", type="string", length=100, nullable=true)
     */
    private $r05;

    /**
     * @var string
     *
     * @ORM\Column(name="R06", type="string", length=1000, nullable=true)
     */
    private $r06;

    /**
     * @var integer
     *
     * @ORM\Column(name="R07", type="integer", nullable=true)
     */
    private $r07;

    /**
     * @var integer
     *
     * @ORM\Column(name="R08", type="integer", nullable=true)
     */
    private $r08;

    /**
     * @var integer
     *
     * @ORM\Column(name="R09", type="integer", nullable=true)
     */
    private $r09;

    /**
     * @var string
     *
     * @ORM\Column(name="R10", type="string", length=1000, nullable=true)
     */
    private $r10;

    /**
     * @var integer
     *
     * @ORM\Column(name="R11", type="integer", nullable=true)
     */
    private $r11;

    /**
     * @var integer
     *
     * @ORM\Column(name="R12", type="integer", nullable=true)
     */
    private $r12;

    /**
     * @var string
     *
     * @ORM\Column(name="R13", type="string", length=1000, nullable=true)
     */
    private $r13;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_cie_1", type="string", length=20, nullable=true)
     */
    private $codCie1;

    /**
     * @var integer
     *
     * @ORM\Column(name="R14_1", type="integer", nullable=true)
     */
    private $r141;

    /**
     * @var integer
     *
     * @ORM\Column(name="R15_1", type="integer", nullable=true)
     */
    private $r151;

    /**
     * @var string
     *
     * @ORM\Column(name="R16_1", type="string", length=1000, nullable=true)
     */
    private $r161;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_cie_2", type="string", length=20, nullable=true)
     */
    private $codCie2;

    /**
     * @var integer
     *
     * @ORM\Column(name="R14_2", type="integer", nullable=true)
     */
    private $r142;

    /**
     * @var integer
     *
     * @ORM\Column(name="R15_2", type="integer", nullable=true)
     */
    private $r152;

    /**
     * @var string
     *
     * @ORM\Column(name="R16_2", type="string", length=1000, nullable=true)
     */
    private $r162;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_cie_3", type="string", length=20, nullable=true)
     */
    private $codCie3;

    /**
     * @var integer
     *
     * @ORM\Column(name="R14_3", type="integer", nullable=true)
     */
    private $r143;

    /**
     * @var integer
     *
     * @ORM\Column(name="R15_3", type="integer", nullable=true)
     */
    private $r153;

    /**
     * @var string
     *
     * @ORM\Column(name="R16_3", type="string", length=1000, nullable=true)
     */
    private $r163;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_cie_4", type="string", length=20, nullable=true)
     */
    private $codCie4;

    /**
     * @var integer
     *
     * @ORM\Column(name="R14_4", type="integer", nullable=true)
     */
    private $r144;

    /**
     * @var integer
     *
     * @ORM\Column(name="R15_4", type="integer", nullable=true)
     */
    private $r154;

    /**
     * @var string
     *
     * @ORM\Column(name="R16_4", type="string", length=1000, nullable=true)
     */
    private $r164;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_cie_5", type="string", length=20, nullable=true)
     */
    private $codCie5;

    /**
     * @var integer
     *
     * @ORM\Column(name="R14_5", type="integer", nullable=true)
     */
    private $r145;

    /**
     * @var integer
     *
     * @ORM\Column(name="R15_5", type="integer", nullable=true)
     */
    private $r155;

    /**
     * @var string
     *
     * @ORM\Column(name="R16_5", type="string", length=1000, nullable=true)
     */
    private $r165;

    /**
     * @var integer
     *
     * @ORM\Column(name="R17", type="integer", nullable=true)
     */
    private $r17;

    /**
     * @var integer
     *
     * @ORM\Column(name="R18", type="integer", nullable=true)
     */
    private $r18;

    /**
     * @var string
     *
     * @ORM\Column(name="R19", type="string", length=1000, nullable=true)
     */
    private $r19;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tl_1", type="integer", nullable=true)
     */
    private $idTl1;

    /**
     * @var integer
     *
     * @ORM\Column(name="R20_1", type="integer", nullable=true)
     */
    private $r201;

    /**
     * @var integer
     *
     * @ORM\Column(name="R21_1", type="integer", nullable=true)
     */
    private $r211;

    /**
     * @var integer
     *
     * @ORM\Column(name="R22_1", type="integer", nullable=true)
     */
    private $r221;

    /**
     * @var integer
     *
     * @ORM\Column(name="R23_1", type="integer", nullable=true)
     */
    private $r231;

    /**
     * @var integer
     *
     * @ORM\Column(name="R24_1", type="integer", nullable=true)
     */
    private $r241;

    /**
     * @var integer
     *
     * @ORM\Column(name="R25_1", type="integer", nullable=true)
     */
    private $r251;

    /**
     * @var string
     *
     * @ORM\Column(name="R26_1", type="string", length=1000, nullable=true)
     */
    private $r261;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tl_2", type="integer", nullable=true)
     */
    private $idTl2;

    /**
     * @var integer
     *
     * @ORM\Column(name="R20_2", type="integer", nullable=true)
     */
    private $r202;

    /**
     * @var integer
     *
     * @ORM\Column(name="R21_2", type="integer", nullable=true)
     */
    private $r212;

    /**
     * @var integer
     *
     * @ORM\Column(name="R22_2", type="integer", nullable=true)
     */
    private $r222;

    /**
     * @var integer
     *
     * @ORM\Column(name="R23_2", type="integer", nullable=true)
     */
    private $r232;

    /**
     * @var integer
     *
     * @ORM\Column(name="R24_2", type="integer", nullable=true)
     */
    private $r242;

    /**
     * @var integer
     *
     * @ORM\Column(name="R25_2", type="integer", nullable=true)
     */
    private $r252;

    /**
     * @var string
     *
     * @ORM\Column(name="R26_2", type="string", length=1000, nullable=true)
     */
    private $r262;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tl_3", type="integer", nullable=true)
     */
    private $idTl3;

    /**
     * @var integer
     *
     * @ORM\Column(name="R20_3", type="integer", nullable=true)
     */
    private $r203;

    /**
     * @var integer
     *
     * @ORM\Column(name="R21_3", type="integer", nullable=true)
     */
    private $r213;

    /**
     * @var integer
     *
     * @ORM\Column(name="R22_3", type="integer", nullable=true)
     */
    private $r223;

    /**
     * @var integer
     *
     * @ORM\Column(name="R23_3", type="integer", nullable=true)
     */
    private $r233;

    /**
     * @var integer
     *
     * @ORM\Column(name="R24_3", type="integer", nullable=true)
     */
    private $r243;

    /**
     * @var integer
     *
     * @ORM\Column(name="R25_3", type="integer", nullable=true)
     */
    private $r253;

    /**
     * @var string
     *
     * @ORM\Column(name="R26_3", type="string", length=1000, nullable=true)
     */
    private $r263;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tl_4", type="integer", nullable=true)
     */
    private $idTl4;

    /**
     * @var integer
     *
     * @ORM\Column(name="R20_4", type="integer", nullable=true)
     */
    private $r204;

    /**
     * @var integer
     *
     * @ORM\Column(name="R21_4", type="integer", nullable=true)
     */
    private $r214;

    /**
     * @var integer
     *
     * @ORM\Column(name="R22_4", type="integer", nullable=true)
     */
    private $r224;

    /**
     * @var integer
     *
     * @ORM\Column(name="R23_4", type="integer", nullable=true)
     */
    private $r234;

    /**
     * @var integer
     *
     * @ORM\Column(name="R24_4", type="integer", nullable=true)
     */
    private $r244;

    /**
     * @var integer
     *
     * @ORM\Column(name="R25_4", type="integer", nullable=true)
     */
    private $r254;

    /**
     * @var string
     *
     * @ORM\Column(name="R26_4", type="string", length=1000, nullable=true)
     */
    private $r264;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tl_5", type="integer", nullable=true)
     */
    private $idTl5;

    /**
     * @var integer
     *
     * @ORM\Column(name="R20_5", type="integer", nullable=true)
     */
    private $r205;

    /**
     * @var integer
     *
     * @ORM\Column(name="R21_5", type="integer", nullable=true)
     */
    private $r215;

    /**
     * @var integer
     *
     * @ORM\Column(name="R22_5", type="integer", nullable=true)
     */
    private $r225;

    /**
     * @var integer
     *
     * @ORM\Column(name="R23_5", type="integer", nullable=true)
     */
    private $r235;

    /**
     * @var integer
     *
     * @ORM\Column(name="R24_5", type="integer", nullable=true)
     */
    private $r245;

    /**
     * @var integer
     *
     * @ORM\Column(name="R25_5", type="integer", nullable=true)
     */
    private $r255;

    /**
     * @var string
     *
     * @ORM\Column(name="R26_5", type="string", length=1000, nullable=true)
     */
    private $r265;

    /**
     * @var integer
     *
     * @ORM\Column(name="R27", type="integer", nullable=true)
     */
    private $r27;

    /**
     * @var integer
     *
     * @ORM\Column(name="R28", type="integer", nullable=true)
     */
    private $r28;

    /**
     * @var string
     *
     * @ORM\Column(name="R29", type="string", length=1000, nullable=true)
     */
    private $r29;

    /**
     * @var integer
     *
     * @ORM\Column(name="R30", type="integer", nullable=true)
     */
    private $r30;

    /**
     * @var integer
     *
     * @ORM\Column(name="R31", type="integer", nullable=true)
     */
    private $r31;

    /**
     * @var string
     *
     * @ORM\Column(name="R32", type="string", length=1000, nullable=true)
     */
    private $r32;

    /**
     * @var integer
     *
     * @ORM\Column(name="R33", type="integer", nullable=true)
     */
    private $r33;

    /**
     * @var integer
     *
     * @ORM\Column(name="R34", type="integer", nullable=true)
     */
    private $r34;

    /**
     * @var string
     *
     * @ORM\Column(name="R35", type="string", length=1000, nullable=true)
     */
    private $r35;

    /**
     * @var integer
     *
     * @ORM\Column(name="R36", type="integer", nullable=true)
     */
    private $r36;

    /**
     * @var integer
     *
     * @ORM\Column(name="R37", type="integer", nullable=true)
     */
    private $r37;

    /**
     * @var integer
     *
     * @ORM\Column(name="R38", type="integer", nullable=true)
     */
    private $r38;

    /**
     * @var integer
     *
     * @ORM\Column(name="R39", type="integer", nullable=true)
     */
    private $r39;

    /**
     * @var string
     *
     * @ORM\Column(name="R40", type="string", length=1000, nullable=true)
     */
    private $r40;

    /**
     * @var integer
     *
     * @ORM\Column(name="R41", type="integer", nullable=true)
     */
    private $r41;

    /**
     * @var integer
     *
     * @ORM\Column(name="R42", type="integer", nullable=true)
     */
    private $r42;

    /**
     * @var integer
     *
     * @ORM\Column(name="R43", type="integer", nullable=true)
     */
    private $r43;

    /**
     * @var integer
     *
     * @ORM\Column(name="R44", type="integer", nullable=true)
     */
    private $r44;

    /**
     * @var integer
     *
     * @ORM\Column(name="R45", type="integer", nullable=true)
     */
    private $r45;

    /**
     * @var integer
     *
     * @ORM\Column(name="R46", type="integer", nullable=true)
     */
    private $r46;

    /**
     * @var integer
     *
     * @ORM\Column(name="R47", type="integer", nullable=true)
     */
    private $r47;

    /**
     * @var integer
     *
     * @ORM\Column(name="R48", type="integer", nullable=true)
     */
    private $r48;

    /**
     * @var string
     *
     * @ORM\Column(name="R49", type="string", length=1000, nullable=true)
     */
    private $r49;

    /**
     * @var integer
     *
     * @ORM\Column(name="R50", type="integer", nullable=true)
     */
    private $r50;

    /**
     * @var integer
     *
     * @ORM\Column(name="R51", type="integer", nullable=true)
     */
    private $r51;

    /**
     * @var string
     *
     * @ORM\Column(name="R52", type="string", length=1000, nullable=true)
     */
    private $r52;

    /**
     * @var string
     *
     * @ORM\Column(name="R53", type="string", length=100, nullable=true)
     */
    private $r53;

    /**
     * @var string
     *
     * @ORM\Column(name="R54", type="string", length=100, nullable=true)
     */
    private $r54;

    /**
     * @var string
     *
     * @ORM\Column(name="R55", type="string", length=100, nullable=true)
     */
    private $r55;

    /**
     * @var string
     *
     * @ORM\Column(name="R56", type="string", length=100, nullable=true)
     */
    private $r56;

    /**
     * @var string
     *
     * @ORM\Column(name="R57", type="string", length=100, nullable=true)
     */
    private $r57;

    /**
     * @var string
     *
     * @ORM\Column(name="R58", type="string", length=100, nullable=true)
     */
    private $r58;

    /**
     * @var integer
     *
     * @ORM\Column(name="R59", type="integer", nullable=true)
     */
    private $r59;

    /**
     * @var integer
     *
     * @ORM\Column(name="R60", type="integer", nullable=true)
     */
    private $r60;

    /**
     * @var integer
     *
     * @ORM\Column(name="R61", type="integer", nullable=true)
     */
    private $r61;

    /**
     * @var integer
     *
     * @ORM\Column(name="R62", type="integer", nullable=true)
     */
    private $r62;

    /**
     * @var integer
     *
     * @ORM\Column(name="R63", type="integer", nullable=true)
     */
    private $r63;

    /**
     * @var string
     *
     * @ORM\Column(name="R64", type="string", length=1000, nullable=true)
     */
    private $r64;

    /**
     * @var integer
     *
     * @ORM\Column(name="R65", type="integer", nullable=true)
     */
    private $r65;

    /**
     * @var integer
     *
     * @ORM\Column(name="R66", type="integer", nullable=true)
     */
    private $r66;

    /**
     * @var integer
     *
     * @ORM\Column(name="R67", type="integer", nullable=true)
     */
    private $r67;

    /**
     * @var integer
     *
     * @ORM\Column(name="R68", type="integer", nullable=true)
     */
    private $r68;

    /**
     * @var integer
     *
     * @ORM\Column(name="R69", type="integer", nullable=true)
     */
    private $r69;

    /**
     * @var integer
     *
     * @ORM\Column(name="R70", type="integer", nullable=true)
     */
    private $r70;

    /**
     * @var integer
     *
     * @ORM\Column(name="idQDS2", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idqds2;


    //GETTER AND SETTER FUSDORAH
    public function getDtcreate(){
        return $this->dtcreate;
    }

    public function setDtcreate($dtcreate){
        $this->dtcreate = $dtcreate;
    }

    public function getNumPas(){
        return $this->numPas;
    }

    public function setNumPas($numPas){
        $this->numPas = $numPas;
    }

    public function getNumDos(){
        return $this->numDos;
    }

    public function setNumDos($numDos){
        $this->numDos = $numDos;
    }

    public function getIdPackDates(){
        return $this->idPackDates;
    }

    public function setIdPackDates($idPackDates){
        $this->idPackDates = $idPackDates;
    }

    public function getQdspattern(){
        return $this->qdspattern;
    }

    public function setQdspattern($qdspattern){
        $this->qdspattern = $qdspattern;
    }

    public function getPublie(){
        return $this->publie;
    }

    public function setPublie($publie){
        $this->publie = $publie;
    }

    public function getR01(){
        return $this->r01;
    }

    public function setR01($r01){
        $this->r01 = $r01;
    }

    public function getR02(){
        return $this->r02;
    }

    public function setR02($r02){
        $this->r02 = $r02;
    }

    public function getR03(){
        return $this->r03;
    }

    public function setR03($r03){
        $this->r03 = $r03;
    }

    public function getR04(){
        return $this->r04;
    }

    public function setR04($r04){
        $this->r04 = $r04;
    }

    public function getR05(){
        return $this->r05;
    }

    public function setR05($r05){
        $this->r05 = $r05;
    }

    public function getR06(){
        return $this->r06;
    }

    public function setR06($r06){
        $this->r06 = $r06;
    }

    public function getR07(){
        return $this->r07;
    }

    public function setR07($r07){
        $this->r07 = $r07;
    }

    public function getR08(){
        return $this->r08;
    }

    public function setR08($r08){
        $this->r08 = $r08;
    }

    public function getR09(){
        return $this->r09;
    }

    public function setR09($r09){
        $this->r09 = $r09;
    }

    public function getR10(){
        return $this->r10;
    }

    public function setR10($r10){
        $this->r10 = $r10;
    }

    public function getR11(){
        return $this->r11;
    }

    public function setR11($r11){
        $this->r11 = $r11;
    }

    public function getR12(){
        return $this->r12;
    }

    public function setR12($r12){
        $this->r12 = $r12;
    }

    public function getR13(){
        return $this->r13;
    }

    public function setR13($r13){
        $this->r13 = $r13;
    }

    public function getCodCie1(){
        return $this->codCie1;
    }

    public function setCodCie1($codCie1){
        $this->codCie1 = $codCie1;
    }

    public function getR141(){
        return $this->r141;
    }

    public function setR141($r141){
        $this->r141 = $r141;
    }

    public function getR151(){
        return $this->r151;
    }

    public function setR151($r151){
        $this->r151 = $r151;
    }

    public function getR161(){
        return $this->r161;
    }

    public function setR161($r161){
        $this->r161 = $r161;
    }

    public function getCodCie2(){
        return $this->codCie2;
    }

    public function setCodCie2($codCie2){
        $this->codCie2 = $codCie2;
    }

    public function getR142(){
        return $this->r142;
    }

    public function setR142($r142){
        $this->r142 = $r142;
    }

    public function getR152(){
        return $this->r152;
    }

    public function setR152($r152){
        $this->r152 = $r152;
    }

    public function getR162(){
        return $this->r162;
    }

    public function setR162($r162){
        $this->r162 = $r162;
    }

    public function getCodCie3(){
        return $this->codCie3;
    }

    public function setCodCie3($codCie3){
        $this->codCie3 = $codCie3;
    }

    public function getR143(){
        return $this->r143;
    }

    public function setR143($r143){
        $this->r143 = $r143;
    }

    public function getR153(){
        return $this->r153;
    }

    public function setR153($r153){
        $this->r153 = $r153;
    }

    public function getR163(){
        return $this->r163;
    }

    public function setR163($r163){
        $this->r163 = $r163;
    }

    public function getCodCie4(){
        return $this->codCie4;
    }

    public function setCodCie4($codCie4){
        $this->codCie4 = $codCie4;
    }

    public function getR144(){
        return $this->r144;
    }

    public function setR144($r144){
        $this->r144 = $r144;
    }

    public function getR154(){
        return $this->r154;
    }

    public function setR154($r154){
        $this->r154 = $r154;
    }

    public function getR164(){
        return $this->r164;
    }

    public function setR164($r164){
        $this->r164 = $r164;
    }

    public function getCodCie5(){
        return $this->codCie5;
    }

    public function setCodCie5($codCie5){
        $this->codCie5 = $codCie5;
    }

    public function getR145(){
        return $this->r145;
    }

    public function setR145($r145){
        $this->r145 = $r145;
    }

    public function getR155(){
        return $this->r155;
    }

    public function setR155($r155){
        $this->r155 = $r155;
    }

    public function getR165(){
        return $this->r165;
    }

    public function setR165($r165){
        $this->r165 = $r165;
    }

    public function getR17(){
        return $this->r17;
    }

    public function setR17($r17){
        $this->r17 = $r17;
    }

    public function getR18(){
        return $this->r18;
    }

    public function setR18($r18){
        $this->r18 = $r18;
    }

    public function getR19(){
        return $this->r19;
    }

    public function setR19($r19){
        $this->r19 = $r19;
    }

    public function getIdTl1(){
        return $this->idTl1;
    }

    public function setIdTl1($idTl1){
        $this->idTl1 = $idTl1;
    }

    public function getR201(){
        return $this->r201;
    }

    public function setR201($r201){
        $this->r201 = $r201;
    }

    public function getR211(){
        return $this->r211;
    }

    public function setR211($r211){
        $this->r211 = $r211;
    }

    public function getR221(){
        return $this->r221;
    }

    public function setR221($r221){
        $this->r221 = $r221;
    }

    public function getR231(){
        return $this->r231;
    }

    public function setR231($r231){
        $this->r231 = $r231;
    }

    public function getR241(){
        return $this->r241;
    }

    public function setR241($r241){
        $this->r241 = $r241;
    }

    public function getR251(){
        return $this->r251;
    }

    public function setR251($r251){
        $this->r251 = $r251;
    }

    public function getR261(){
        return $this->r261;
    }

    public function setR261($r261){
        $this->r261 = $r261;
    }

    public function getIdTl2(){
        return $this->idTl2;
    }

    public function setIdTl2($idTl2){
        $this->idTl2 = $idTl2;
    }

    public function getR202(){
        return $this->r202;
    }

    public function setR202($r202){
        $this->r202 = $r202;
    }

    public function getR212(){
        return $this->r212;
    }

    public function setR212($r212){
        $this->r212 = $r212;
    }

    public function getR222(){
        return $this->r222;
    }

    public function setR222($r222){
        $this->r222 = $r222;
    }

    public function getR232(){
        return $this->r232;
    }

    public function setR232($r232){
        $this->r232 = $r232;
    }

    public function getR242(){
        return $this->r242;
    }

    public function setR242($r242){
        $this->r242 = $r242;
    }

    public function getR252(){
        return $this->r252;
    }

    public function setR252($r252){
        $this->r252 = $r252;
    }

    public function getR262(){
        return $this->r262;
    }

    public function setR262($r262){
        $this->r262 = $r262;
    }

    public function getIdTl3(){
        return $this->idTl3;
    }

    public function setIdTl3($idTl3){
        $this->idTl3 = $idTl3;
    }

    public function getR203(){
        return $this->r203;
    }

    public function setR203($r203){
        $this->r203 = $r203;
    }

    public function getR213(){
        return $this->r213;
    }

    public function setR213($r213){
        $this->r213 = $r213;
    }

    public function getR223(){
        return $this->r223;
    }

    public function setR223($r223){
        $this->r223 = $r223;
    }

    public function getR233(){
        return $this->r233;
    }

    public function setR233($r233){
        $this->r233 = $r233;
    }

    public function getR243(){
        return $this->r243;
    }

    public function setR243($r243){
        $this->r243 = $r243;
    }

    public function getR253(){
        return $this->r253;
    }

    public function setR253($r253){
        $this->r253 = $r253;
    }

    public function getR263(){
        return $this->r263;
    }

    public function setR263($r263){
        $this->r263 = $r263;
    }

    public function getIdTl4(){
        return $this->idTl4;
    }

    public function setIdTl4($idTl4){
        $this->idTl4 = $idTl4;
    }

    public function getR204(){
        return $this->r204;
    }

    public function setR204($r204){
        $this->r204 = $r204;
    }

    public function getR214(){
        return $this->r214;
    }

    public function setR214($r214){
        $this->r214 = $r214;
    }

    public function getR224(){
        return $this->r224;
    }

    public function setR224($r224){
        $this->r224 = $r224;
    }

    public function getR234(){
        return $this->r234;
    }

    public function setR234($r234){
        $this->r234 = $r234;
    }

    public function getR244(){
        return $this->r244;
    }

    public function setR244($r244){
        $this->r244 = $r244;
    }

    public function getR254(){
        return $this->r254;
    }

    public function setR254($r254){
        $this->r254 = $r254;
    }

    public function getR264(){
        return $this->r264;
    }

    public function setR264($r264){
        $this->r264 = $r264;
    }

    public function getIdTl5(){
        return $this->idTl5;
    }

    public function setIdTl5($idTl5){
        $this->idTl5 = $idTl5;
    }

    public function getR205(){
        return $this->r205;
    }

    public function setR205($r205){
        $this->r205 = $r205;
    }

    public function getR215(){
        return $this->r215;
    }

    public function setR215($r215){
        $this->r215 = $r215;
    }

    public function getR225(){
        return $this->r225;
    }

    public function setR225($r225){
        $this->r225 = $r225;
    }

    public function getR235(){
        return $this->r235;
    }

    public function setR235($r235){
        $this->r235 = $r235;
    }

    public function getR245(){
        return $this->r245;
    }

    public function setR245($r245){
        $this->r245 = $r245;
    }

    public function getR255(){
        return $this->r255;
    }

    public function setR255($r255){
        $this->r255 = $r255;
    }

    public function getR265(){
        return $this->r265;
    }

    public function setR265($r265){
        $this->r265 = $r265;
    }

    public function getR27(){
        return $this->r27;
    }

    public function setR27($r27){
        $this->r27 = $r27;
    }

    public function getR28(){
        return $this->r28;
    }

    public function setR28($r28){
        $this->r28 = $r28;
    }

    public function getR29(){
        return $this->r29;
    }

    public function setR29($r29){
        $this->r29 = $r29;
    }

    public function getR30(){
        return $this->r30;
    }

    public function setR30($r30){
        $this->r30 = $r30;
    }

    public function getR31(){
        return $this->r31;
    }

    public function setR31($r31){
        $this->r31 = $r31;
    }

    public function getR32(){
        return $this->r32;
    }

    public function setR32($r32){
        $this->r32 = $r32;
    }

    public function getR33(){
        return $this->r33;
    }

    public function setR33($r33){
        $this->r33 = $r33;
    }

    public function getR34(){
        return $this->r34;
    }

    public function setR34($r34){
        $this->r34 = $r34;
    }

    public function getR35(){
        return $this->r35;
    }

    public function setR35($r35){
        $this->r35 = $r35;
    }

    public function getR36(){
        return $this->r36;
    }

    public function setR36($r36){
        $this->r36 = $r36;
    }

    public function getR37(){
        return $this->r37;
    }

    public function setR37($r37){
        $this->r37 = $r37;
    }

    public function getR38(){
        return $this->r38;
    }

    public function setR38($r38){
        $this->r38 = $r38;
    }

    public function getR39(){
        return $this->r39;
    }

    public function setR39($r39){
        $this->r39 = $r39;
    }

    public function getR40(){
        return $this->r40;
    }

    public function setR40($r40){
        $this->r40 = $r40;
    }

    public function getR41(){
        return $this->r41;
    }

    public function setR41($r41){
        $this->r41 = $r41;
    }

    public function getR42(){
        return $this->r42;
    }

    public function setR42($r42){
        $this->r42 = $r42;
    }

    public function getR43(){
        return $this->r43;
    }

    public function setR43($r43){
        $this->r43 = $r43;
    }

    public function getR44(){
        return $this->r44;
    }

    public function setR44($r44){
        $this->r44 = $r44;
    }

    public function getR45(){
        return $this->r45;
    }

    public function setR45($r45){
        $this->r45 = $r45;
    }

    public function getR46(){
        return $this->r46;
    }

    public function setR46($r46){
        $this->r46 = $r46;
    }

    public function getR47(){
        return $this->r47;
    }

    public function setR47($r47){
        $this->r47 = $r47;
    }

    public function getR48(){
        return $this->r48;
    }

    public function setR48($r48){
        $this->r48 = $r48;
    }

    public function getR49(){
        return $this->r49;
    }

    public function setR49($r49){
        $this->r49 = $r49;
    }

    public function getR50(){
        return $this->r50;
    }

    public function setR50($r50){
        $this->r50 = $r50;
    }

    public function getR51(){
        return $this->r51;
    }

    public function setR51($r51){
        $this->r51 = $r51;
    }

    public function getR52(){
        return $this->r52;
    }

    public function setR52($r52){
        $this->r52 = $r52;
    }

    public function getR53(){
        return $this->r53;
    }

    public function setR53($r53){
        $this->r53 = $r53;
    }

    public function getR54(){
        return $this->r54;
    }

    public function setR54($r54){
        $this->r54 = $r54;
    }

    public function getR55(){
        return $this->r55;
    }

    public function setR55($r55){
        $this->r55 = $r55;
    }

    public function getR56(){
        return $this->r56;
    }

    public function setR56($r56){
        $this->r56 = $r56;
    }

    public function getR57(){
        return $this->r57;
    }

    public function setR57($r57){
        $this->r57 = $r57;
    }

    public function getR58(){
        return $this->r58;
    }

    public function setR58($r58){
        $this->r58 = $r58;
    }

    public function getR59(){
        return $this->r59;
    }

    public function setR59($r59){
        $this->r59 = $r59;
    }

    public function getR60(){
        return $this->r60;
    }

    public function setR60($r60){
        $this->r60 = $r60;
    }

    public function getR61(){
        return $this->r61;
    }

    public function setR61($r61){
        $this->r61 = $r61;
    }

    public function getR62(){
        return $this->r62;
    }

    public function setR62($r62){
        $this->r62 = $r62;
    }

    public function getR63(){
        return $this->r63;
    }

    public function setR63($r63){
        $this->r63 = $r63;
    }

    public function getR64(){
        return $this->r64;
    }

    public function setR64($r64){
        $this->r64 = $r64;
    }

    public function getR65(){
        return $this->r65;
    }

    public function setR65($r65){
        $this->r65 = $r65;
    }

    public function getR66(){
        return $this->r66;
    }

    public function setR66($r66){
        $this->r66 = $r66;
    }

    public function getR67(){
        return $this->r67;
    }

    public function setR67($r67){
        $this->r67 = $r67;
    }

    public function getR68(){
        return $this->r68;
    }

    public function setR68($r68){
        $this->r68 = $r68;
    }

    public function getR69(){
        return $this->r69;
    }

    public function setR69($r69){
        $this->r69 = $r69;
    }

    public function getR70(){
        return $this->r70;
    }

    public function setR70($r70){
        $this->r70 = $r70;
    }

    public function getIdqds2(){
        return $this->idqds2;
    }

    public function setIdqds2($idqds2){
        $this->idqds2 = $idqds2;
    }
}

