<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{

    /**
     * @Route("/", name="home")
     */

    public function index(){
        
        return $this->render("home/index.html.twig",[
            "title"=>"Bienvenue sur mon site",
            "message"=>"Hello world ! Bienvenue sur mon site",
            "menu"=> "home"
        ]);
    }

    /**
     * @Route("/", name="contact")
     */

    public function contact(){

        return $this->render("home/contact.html.twig",[
            "menu"=> "contact"
        ]);
    }
}

?>