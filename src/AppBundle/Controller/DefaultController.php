<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Qds2Pattern;
use AppBundle\Entity\Qds2Question;
use AppBundle\Entity\Qds2Step;
use AppBundle\Entity\Qds2Block;
use AppBundle\Entity\Qds2;
use \Datetime;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
/*use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\Extension\Csrf\CsrfExtension;
use Symfony\Component\Security\Csrf\TokenStorage\SessionTokenStorage;
use Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Component\Form\FormRenderer;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;*/



class DefaultController extends Controller
{

    //Init la session
    public function _init($request)
    {
        try {

            $guidesTMP = '{"2444":"Sarah SCAGLIONE","1989":"Julien BALDY"}';

            if(!$this->container->get('session')->isStarted())
            {
                $session = new Session();
                $session->start();
            }

            $session = $this->get('session');
            $session->set('currentDate', date("Y-m-d H:i:s"));
            $session->set('guidesTMP', $guidesTMP);
            $session->set('marque', $request->query->get('marque'));
            $session->set('typeQds', $request->query->get('typeQds'));
        } catch (Exception $e) {
            return new Response("Error : " . $e->getMessage());
        }

    }


    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        date_default_timezone_set('Europe/Paris');
/*        if(!isset($session))
        {
            $session = $request->getSession();
        }

        $csrfGenerator = new UriSafeTokenGenerator();
        $csrfStorage = new SessionTokenStorage($session);
        $csrfManager = new CsrfTokenManager($csrfGenerator, $csrfStorage);

        $formFactory = Forms::createFormFactoryBuilder()
            // ...
            ->addExtension(new CsrfExtension($csrfManager))
            ->getFormFactory();

        $form = $formFactory->createBuilder()
            ->add('QSD', TextType::class)
            ->getForm();*/

        $this->_init($request);  

        try {
            $session        = $this->get('session');
            $typeQds        = $session->get('typeQds');
            $patternRepo    = $this->getDoctrine()->getRepository(Qds2Pattern::class);
            $stepRepo       = $this->getDoctrine()->getRepository(Qds2Step::class);
            
            //Manque le concept de marque
            $pattern        = $patternRepo->findOneBy(array('qdspattern' => $typeQds));
            $arrayStep      = array();
            $steps          = $stepRepo->findBy(array('idpattern' => $pattern->getIdpattern()));

            $session->set('qdspattern', $pattern);

            //récupérer les step automatiquement suivant le type de questionnaire
            foreach ($steps as $value) {
                $step = $this->_getStep($pattern , $value->getSteporder());
                array_push($arrayStep, $step);
            }

            /*$stepOne        = $this->_getStep($pattern , 1); //AVANT DEPART
            $stepTwo        = $this->_getStep($pattern , 2); //PENDANT VOYAGE
            $stepThree      = $this->_getStep($pattern , 3); //APRES VOYAGE
            $stepFour       = $this->_getStep($pattern , 4); //REMERCIEMNET*/

            //A changer par la suite, avoir un template-qds.html.twig
            return $this->render('@App/qds/qds-nord.html.twig', 
                array('arrayStep' => $arrayStep));
        } catch (Exception $e) {
            return new Response("Error : " . $e->getMessage());
        }
        
    }


    /*
    *   Function _getStep qui permet de récupérer sous form d'array les données d'un type de questionnaire (avant départ, pendant voyage, etc...)
    *   @param 
    *       $pattern    - pour récupe l'id du pattern, 
    *       $stepOrder  - le numéro/ordre du step à récupe
    *   @return array $arrayFinal  
    */
    public function _getStep($pattern , $stepOrder)
    {
        try {
         
            $session = $this->get('session');

            //variable
            $arrayBlockMultiple     = array();
            $arrayIncrementResponse = array();
            $arrayFinal             = array();
            $arrayblockTmp          = array();
            $arrayquestionTmp       = array();
            $idPattern              = $pattern->getIdpattern();
        
            //repository    
            $blockRepo              = $this->getDoctrine()->getRepository(Qds2Block::class);
            $stepRepo               = $this->getDoctrine()->getRepository(Qds2Step::class);
            $questionRepo           = $this->getDoctrine()->getRepository(Qds2Question::class);

            //je récupé le step voulu
            $step                   = $stepRepo->findOneBy(array('idpattern' => $idPattern, 'steporder' => $stepOrder));
            $idStep                 = $step->getIdstep();
            $titleStep              = $step->getSteptitle();
            $guidesTMP              = json_decode($session->get('guidesTMP'));

            //je garde le titre du step de coté
            array_push($arrayFinal, $titleStep);

            //je récupe le block 
            $blocks = $blockRepo->findBy(array('idstep' => $idStep), array('blockorder' => 'ASC'));

            //pour tous les blocks
            foreach ($blocks as $block) 
            {
                $arrayBlock                     = array();
                $idBlock                        = $block->getIdblock();
                $blockTitle                     = $block->getBlocktitle();
                $blockMultiple                  = $block->getBlockmultiple();
                $blockOrder                     = $block->getBlockorder();

                $arrayBlock['idBlock']          = $idBlock;
                $arrayBlock['blockTitle']       = $blockTitle;
                $arrayBlock['blockMultiple']    = $blockMultiple;
                $arrayBlock['blockOrder']       = $blockOrder;

                //je cherche les questions du bloc
                $questions = $questionRepo->findBy(array('idblock' => $idBlock));

                if($blockMultiple > 1)
                {
                    //condition pour block multiple, 7 est à remplacer en dynamic
                    if($idBlock == 7)
                    {
                        $nb = 1;

                        //pour chaque guide
                        foreach ($guidesTMP as $key => $value) {
                            $blockTitleTMP = $blockTitle;
                            $blockTitleTMP = str_replace("[nomTourLeader]", $value, $blockTitle);
                            $arrayBlock['blockTitle'] = $blockTitleTMP;
                            $arrayBlock['guideID']    = $key;

                            foreach ($questions as $question) {

                                $arrayQuestion                          = array();
                                $idQuestion                             = $question->getIdquestion();
                                $headerQuestion                         = $question->getQuestionheader();
                                $titleQuestion                          = $question->getQuestiontitle();
                                $typeQuestion                           = $question->getQuestiontype();
                                $choiceQuestion                         = $question->getQuestionchoice();
                                $mandatoryQuestion                      = $question->getQuestionmandatory();
                                $orderQuestion                          = $question->getQuestionorder();
                                $visibleQuestion                        = $question->getQuestionvisible();
                                $responseIDQuestion                     = $question->getResponseid();

                                $arrayQuestion['idQuestion']            = $idQuestion;
                                $arrayQuestion['headerQuestion']        = $headerQuestion;
                                $arrayQuestion['titleQuestion']         = $titleQuestion;
                                $arrayQuestion['typeQuestion']          = $typeQuestion;
                                $arrayQuestion['choiceQuestion']        = $choiceQuestion;
                                $arrayQuestion['mandatoryQuestion']     = $mandatoryQuestion;
                                $arrayQuestion['orderQuestion']         = $orderQuestion;
                                $arrayQuestion['visibleQuestion']       = $visibleQuestion;

                                $splitId = explode('_', $responseIDQuestion);
                                $idReponse = $splitId[0];

                                $arrayQuestion['responseIDQuestion']    = $idReponse . "_" . $nb;
                                $arrayBlock[$idQuestion]    = $arrayQuestion;
                            }
                            $nb = $nb + 1;
                            array_push($arrayFinal, $arrayBlock);
                        }
                    }
                }
                else
                {
                    foreach ($questions as $question) {
                        $arrayQuestion                          = array();
                        $idQuestion                             = $question->getIdquestion();
                        $headerQuestion                         = $question->getQuestionheader();
                        $titleQuestion                          = $question->getQuestiontitle();
                        $typeQuestion                           = $question->getQuestiontype();
                        $choiceQuestion                         = $question->getQuestionchoice();
                        $mandatoryQuestion                      = $question->getQuestionmandatory();
                        $orderQuestion                          = $question->getQuestionorder();
                        $visibleQuestion                        = $question->getQuestionvisible();
                        $responseIDQuestion                     = $question->getResponseid();

                        $arrayQuestion['idQuestion']            = $idQuestion;
                        $arrayQuestion['headerQuestion']        = $headerQuestion;
                        $arrayQuestion['titleQuestion']         = $titleQuestion;
                        $arrayQuestion['typeQuestion']          = $typeQuestion;
                        $arrayQuestion['choiceQuestion']        = $choiceQuestion;
                        $arrayQuestion['mandatoryQuestion']     = $mandatoryQuestion;
                        $arrayQuestion['orderQuestion']         = $orderQuestion;
                        $arrayQuestion['visibleQuestion']       = $visibleQuestion;
                        $arrayQuestion['responseIDQuestion']    = $responseIDQuestion;

                        if($typeQuestion == "QCM2")
                        {
                            $arrayQuestion['choiceQuestion']    = json_decode($choiceQuestion, true);
                        }
                        if($typeQuestion == "LIST")
                        {
                            //lancer la requête 
                        }

                        $arrayBlock[$idQuestion] = $arrayQuestion;
                    }

                    //je push le bloc dans le tableau final
                    array_push($arrayFinal, $arrayBlock);
                }
            }
            return $arrayFinal;
        } catch (Exception $e) {
            return new Response("Error : " . $e->getMessage());
        }
    }


    //function de sauvegarde du qds, récupère tous les requêtes http post
    //et ajoute chaque réponse en base
    public function saveFormAction(Request $request)
    {
        try {

            $em             = $this->getDoctrine()->getManager();
            //$qdsResponse    = $this->getDoctrine()->getRepository(Qds2::class);
            $oQds           = new Qds2();
            $date           = new \DateTime();

            $numpassTMP     = "TESTNUMPASS0193";
            $numdosTMP      = "TESTNUMDOS98465";
            $idpackdateTMP  = "132";
            $form           = $request->request->all();

            $oQds->setDtcreate($date);
            $oQds->setNumPas($numpassTMP); 
            $oQds->setNumDos($numdosTMP);
            $oQds->setIdPackDates($idpackdateTMP);

            //si y'a du POST
            if ($request->getMethod() == 'POST') {
                //pour tous les valeurs récupe 
                foreach ($form as $key => $value) {

                    //j'explode la key au niveau des trois underscores
                    $listValue = explode("___", $key);
                    //je récupe que l'id reponse
                    $responseID = $listValue[0];
                    
                    //si c'est un id guide
                    if(strpos($responseID, 'id_tl') !== false){
                        $responseID = str_replace('_', '', $listValue[0]);
                    }

                    //je prefix avec "set"
                    $functionName = "set".$responseID;
                    //je regarde si la methode exist dans ma classe entity
                    if(method_exists($oQds,$functionName)) 
                    {
                         var_dump($functionName);
                        //elle existe alors je l'utilise pour setter la value
                        $oQds->$functionName($value); 
                        $em->persist($oQds);
                    }
                    else
                    {   
                        //sinon si la methode n'existe pas, je regarde si elle contient un underscore our les RXX_N
                        if(strpos($functionName, '_') !== false)
                        {
                            //je l'explode
                            $splitId = explode('_', $functionName);
                            //et je concatène pour ne plus avoir l'underscore mais avoir le nom de la methode
                            $functionName = $splitId[0] . $splitId[1];
                            if(method_exists($oQds,$functionName)) 
                            {
                                $oQds->$functionName($value);
                                $em->persist($oQds);
                            }

                        }
                    }
                }
                $em->flush();
                $em->clear();
            }

            return new Response("Success");
        } catch (Exception $e) {
            return new Response("Error : " . $e->getMessage());
        }
    }
}
