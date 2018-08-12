<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\DemandeDevis;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DemandeController extends AbstractController
{
    /**
     * @Route("/demande", name="devis")
     */
    public function index(Request $request ,\Swift_Mailer $mailer)
    {
        $demande = new DemandeDevis();
                  
        $form = $this->createFormBuilder($demande)
                  ->add('NomSociete',TextType::class,array('label'=>'Nom societé *'))
                  ->add('telephone',TelType::class,array('label'=>'Télephone *'))
                  ->add('email',EmailType::class,array('label'=>'Email *'))
                  ->add('fichier',FileType::class,array('label'=>'Demande de devis (document pdf) *'))
                  ->add("conditionUtilisation",CheckboxType::class,array('label'=>"j'ai li et j'accepte les conditions d'utilisation"))
                  ->add("recevoirOffrEmail",CheckboxType::class,array('label'=>"je veux recevoir les offres par email"))
                  ->add('Valider',SubmitType::class,array('attr'=>array('class'=>'btn btn-primary btn-block')))
                  ->getForm();

                  $form->handleRequest($request);

                  if ($form->isSubmitted() && $form->isValid()) {

                    $demande = $form->getData();
                    $file = $form->get('fichier')->getData();
                    $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
                    // moves the file to the directory where  the document devis  are stored
                   $file->move(
                   $this->getParameter('demande_devis_directory'),
                   $fileName
            );
                    $demande->setFichier($fileName);
                    $this->sendMail($demande,$mailer);
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($demande);
                    $entityManager->flush();
                    
                    return $this->redirectToRoute('home');
                  }
        return $this->render('demande/devis.html.twig',array('form'=>$form->createView()));
    }


     /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

    public function sendMail(DemandeDevis $demande , \Swift_Mailer $mailer){
        
    $message = (new \Swift_Message('Demande de devis'))
    ->setFrom($demande->getEmail())
    ->setTo($demande->getEmail())
    ->setBody(
        $this->renderView(
            // templates/demande/demande_email.html.twig
            'demande/demande_email.html.twig',
            array('demande' => $demande)
        ),
        'text/html'
    );
    $mailer->send($message);
    }

}
