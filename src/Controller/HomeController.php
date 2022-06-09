<?php
namespace App\Controller;

use App\Entity\Gite;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{

    /**
     * @Route("/", name="home")
     */

    public function index(ManagerRegistry $doctrine){
        
        $repository = $doctrine ->getRepository(Gite::class);

        $gites = $repository->findAll();

        dump($gites);

        //$manager = $doctrine ->getManager();

        //$gite = new Gite();
        //$gite
        //    ->setNom("Mon premier Gite")
        //    ->setDescription("pharetra pharetra massa massa ultricies mi quis hendrerit dolor magna eget est lorem ipsum dolor sit amet consectetur adipiscing elit")
        //    ->setSurface(80)
        //    ->setChambre(3)
        //    ->setCouchage(5);

        //$manager->persist($gite);

        //$manager->flush();
        
        return $this->render("home/index.html.twig",[
            "title"=>"Bienvenue sur mon site",
            "message"=>"Hello world ! Bienvenue sur mon site",
            "menu"=> "home",
            "gites"=> $gites
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