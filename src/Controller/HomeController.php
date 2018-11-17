<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Entity\Contact;
use App\Entity\CommanderFournitures;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request ,\Swift_Mailer $mailer)
    {
        return $this->render('home/index.html.twig');
    }
        /**
     * @Route("/catalogue", name="catalogue")
     */
    public function catalogue()
    {
        return $this->render('home/catalogue.html.twig');
    }
        /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('home/about.html.twig');
        }
    /**
     * @Route("/services", name="service")
     */
    public function service()
    {
        return $this->render('home/services.html.twig');
        }    
    
     /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request ,\Swift_Mailer $mailer)
    {
        $contact=new Contact();
        $form = $this->createFormBuilder($contact)
                ->add('nom',TextType::class,array('attr'=>array('placeholder'=>'Votre nom'),'label'=>false))
                ->add('email',EmailType::class,array('attr'=>array('placeholder'=>'Email'),'label'=>false))
                ->add('subject',TextType::class,array('attr'=>array('placeholder'=>'Objet'),'label'=>false))
                ->add('message',TextareaType::class,array('attr'=>array('rows'=>'8','placeholder'=>'Votre message',),'label'=>false))
                ->add('Envoyer',SubmitType::class,array('attr'=>array('class'=>'btn btn-primary pull-right')))
                ->getForm();
                $form->handleRequest($request);

                  if ($form->isSubmitted() && $form->isValid()) {

                    $contact = $form->getData();
                    $this->sendMailContact($contact,$mailer);
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($contact);
                    $entityManager->flush();
                    
                    return $this->redirectToRoute('home');
                  }
        return $this->render('home/contact.html.twig',array('form'=>$form->createView()));
    }
    /**
     * @Route("/listFournitures", name="listFournitures")
     */
    public function listFournitures(){
        return $this->render('home/listFournitures.html.twig');
    }
    /**
     * @Route("/commandFournitures", name="commandFournitures")
     */
    public function commanderFournitures(Request $request ,\Swift_Mailer $mailer){
        $cmdFournitures=new CommanderFournitures();
        $institus =array('institus Pascale'=>'Institus Pascale','qalam'=>'Qalam','Institut jean-marie-monier'=>'institut jean-marie-monier');
        $niveau=array('primaire'=>'Primaire','secondaire'=>'Secondaire','lycée'=>'Lycée');
        $form = $this->createFormBuilder($cmdFournitures)
                ->add('nom',TextType::class,array('label'=>'Votre nom *'))
                ->add('email',EmailType::class,array('label'=>'Email *'))
                ->add('telephone',TelType::class,array('label'=>'Téléphone *'))
                ->add('NbrCommande',IntegerType::class,array('label'=>'Nombre de commandes *'))
                ->add('institut',ChoiceType::class,array('label'=>'Institut *','choices'=>$institus))
                ->add('niveau',ChoiceType::class,array('label'=>'Niveau *','choices'=>$niveau))
                ->add('livres',CheckboxType::class,array('label'=>'Livres'))
                ->add('cahiers',CheckboxType::class,array('label'=>'Cahiers'))
                ->add('fournitures',CheckboxType::class,array('label'=>'Fournitures'))
                ->add("confirmationCondition",CheckboxType::class,array('label'=>"j'ai li et j'accepte les conditions d'utilisation"))
                ->add("recevoirOffres",CheckboxType::class,array('label'=>"je veux recevoir les offres par email"))
                ->add('Commander',SubmitType::class,array('attr'=>array('class'=>'btn btn-primary btn-block')))
                ->getForm();
                $form->handleRequest($request);

                  if ($form->isSubmitted() && $form->isValid()) {

                    $cmdFournitures = $form->getData();
                    $this->sendMailCommande($cmdFournitures,$mailer);
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($cmdFournitures);
                    $entityManager->flush();
                    return $this->redirectToRoute('home');
                  }

        return $this->render('home/commanderFournitures.html.twig',array('form'=>$form->createView()));
    }

    public function sendMailContact(Contact $contact , \Swift_Mailer $mailer){
        
        $message = (new \Swift_Message($contact->getSubject()))
        ->setFrom($contact->getEmail())
        ->setTo('a.chayme1997@gmail.com')
        ->setBody(
            $this->renderView(
                // templates/home/contact-email.html.twig
                'home/contact-email.html.twig',
                array('contact' => $contact)
            ),
            'text/html'
        );
        $mailer->send($message);
        }


    public function sendMailCommande(CommanderFournitures $cmdFournitures , \Swift_Mailer $mailer){
        
            $message = (new \Swift_Message('Commander des fournitures'))
            ->setFrom($cmdFournitures->getEmail())
            ->setTo('a.chayme1997@gmail.com')
            ->setBody(
                $this->renderView(
                    // templates/home/commande-email.html.twig
                    'home/commande-email.html.twig',
                    array('cmdFournitures' => $cmdFournitures)
                ),
                'text/html'
            );
            $mailer->send($message);
            }

}
