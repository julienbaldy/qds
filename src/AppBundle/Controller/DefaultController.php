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

        $this->init();   
        $session = $this->get('session');

        $patternRepo    = $this->getDoctrine()->getRepository(Qds2Pattern::class);
        $stepRepo       = $this->getDoctrine()->getRepository(Qds2Step::class);

        //Manque le concept de marque
        $pattern        = $patternRepo->findOneBy(array('qdspattern' => 'GIR'));
        $arrayStep      = array();
        $steps          = $stepRepo->findBy(array('idpattern' => $pattern->getIdpattern()));

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
        return $this->render('default/index.html.twig', 
            array('arrayStep' => $arrayStep));
    }

    //Init la session
    public function init()
    {
        if(!$this->container->get('session')->isStarted())
        {
            $session = new Session();
            $session->start();
            $session->set('current_date', date("Y-m-d H:i:s"));
        }else
        {
            $session = $this->get('session');
            $session->set('current_date', date("Y-m-d H:i:s"));
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
        //je garde le titre du step de coté
        array_push($arrayFinal, $titleStep);

        //je récupe le block 
        $blocks = $blockRepo->findBy(array('idstep' => $idStep), array('blockorder' => 'ASC'));

        //pour tous les blocks
        foreach ($blocks as $block) {
            $arrayBlock                     = array();
            $idBlock                        = $block->getIdblock();
            $blockTitle                     = $block->getBlocktitle();
            $blockMultiple                  = $block->getBlockmultiple();
            $blockOrder                     = $block->getBlockorder();

            $arrayBlock['idBlock']          = $idBlock;
            $arrayBlock['blockTitle']       = $blockTitle;
            $arrayBlock['blockMultiple']    = $blockMultiple;
            $arrayBlock['blockOrder']       = $blockOrder;

            //Si c'est un block multiple je le retiens...
            if($blockMultiple > 1){
                if(!array_key_exists($idBlock, $arrayBlockMultiple)){
                    $arrayBlockMultiple = array($idBlock => 1, "Max" => $blockMultiple);
                }
            }

            //je cherche les questions du bloc
            $questions = $questionRepo->findBy(array('idblock' => $idBlock));

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

                //gestion des multiples reponses par bloc de questions
                if(strpos($responseIDQuestion, 'n') !== false){
                    $splitId = explode('_', $responseIDQuestion);
                    $idReponse = $splitId[0];
                    if(!array_key_exists($idReponse, $arrayIncrementResponse))
                    {
                        $arrayIncrementResponse[$idReponse] = 1;
                        $arrayQuestion['responseIDQuestion'] = $idReponse . "_" . 1;
                        //array_push($arrayIncrementResponse, array($idReponse => 1));
                    }else
                    {
                        $arrayIncrementResponse[$idReponse] += 1;
                        $arrayQuestion['responseIDQuestion'] = $idReponse . "_" . $arrayIncrementResponse[$idReponse];
                    }
                }



                if($typeQuestion == "QCM2")
                {
                    $arrayQuestion['choiceQuestion']    = json_decode($choiceQuestion, true);
                }
                if($typeQuestion == "LIST")
                {
                    //lancer la requête 
                }


                //je met le tableau de question dans le bloc
                $arrayBlock[$idQuestion] = $arrayQuestion;

            }
            //je push le bloc dans le tableau final
            array_push($arrayFinal, $arrayBlock);
        }
        return $arrayFinal;
    }


    public function saveFormAction(Request $request)
    {
        try {

            $em             = $this->getDoctrine()->getManager();
            $form           = $request->request->all();
            $qdsResponse    = $this->getDoctrine()->getRepository(Qds2::class);
            $oQds           = new Qds2();


            if ($request->getMethod() == 'POST') {
                foreach ($form as $key => $value) {
                    $listValue = explode("___", $key);
                    $responseID = $listValue[0];
                    $functionName = "set".$responseID;
                        var_dump($responseID);
                        echo "</br>";
                    if(method_exists ($oQds,$functionName)) {
                    }else
                    {
                    }

                }
            }

            return new Response("Success");
        } catch (Exception $e) {
            return new Response("Error : " . $e->getMessage());
        }
    }
}
