<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request ,\Swift_Mailer $mailer)
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
        return $this->render('home/index.html.twig',array('form'=>$form->createView()));
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
}
