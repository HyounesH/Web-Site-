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
}
