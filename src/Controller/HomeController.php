<?php
namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Gite;
use App\Entity\GiteSearch;
use App\Form\ContactType;
use App\Form\GiteSearchType;
use App\Notification\ContactNotification;
use App\Repository\GiteRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{

    /**
     * @Route("/", name="home_index")
     */

    public function index(ManagerRegistry $doctrine, Request $request){
        
        $search = new GiteSearch();

        $form = $this->createForm(GiteSearchType::class, $search);
        $form->handleRequest($request);
        
        /** @var GiteRepository $repository */
        $repository = $doctrine ->getRepository(Gite::class);
        $gites = $repository->findAll($search);

        if ($form->isSubmitted()) {
            $gites = $repository ->findGiteSearch($search);
        }

        // création du formulaire de recherche 

        

        return $this->render("home/index.html.twig",[
            "title"=>"Bienvenue sur mon site",
            "message"=>"Hello world ! Bienvenue sur mon site",
            "menu"=> "home",
            "gites"=> $gites,
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/contact", name="home_contact")
     */

    public function contact(Request $request, ContactNotification $notification){

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $notification->contactNotify($contact);
            $this->addFlash('success', 'Email envoyé');
        }

        return $this->render("home/contact.html.twig",[
            "menu"=> "contact",
            "form" => $form->createView()
        ]);
    }
}

?>