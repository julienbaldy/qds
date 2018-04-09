<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Qds2Pattern;
use AppBundle\Entity\Qds2Question;
use AppBundle\Entity\Qds2Step;
use AppBundle\Entity\Qds2Block;
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
        $arrayFinal         = array();
        $arrayblockTmp      = array();
        $arrayquestionTmp   = array();
        $idPattern          = $pattern->getIdpattern();

        //repository
        $blockRepo          = $this->getDoctrine()->getRepository(Qds2Block::class);
        $stepRepo           = $this->getDoctrine()->getRepository(Qds2Step::class);
        $questionRepo       = $this->getDoctrine()->getRepository(Qds2Question::class);

        //je récupé le step voulu
        $step               = $stepRepo->findOneBy(array('idpattern' => $idPattern, 'steporder' => $stepOrder));
        $idStep             = $step->getIdstep();
        $titleStep          = $step->getSteptitle();

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

                //je met le tableau de question dans le bloc
                $arrayBlock[$idQuestion] = $arrayQuestion;

            }
            //je push le bloc dans le tableau final
            array_push($arrayFinal, $arrayBlock);
        }
        return $arrayFinal;
    }
}
