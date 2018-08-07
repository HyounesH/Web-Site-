<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('home/contact.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

        /**
     * @Route("/catalogue", name="catalogue")
     */
    public function catalogue()
    {
        return $this->render('home/catalogue.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
        /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('home/about.html.twig', [
            'controller_name' => 'HomeController',
        ]);
        }
}
