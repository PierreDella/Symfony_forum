<?php

namespace App\Controller;

use App\Form\ClientType;
use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index()
    {
       $clients = $this->getDoctrine()
                       ->getRepository(Client::class)
                       ->getAll();
                       
        return $this->render('client/index.html.twig', [
            'clients' => $clients
        ]);
    }
    /**
     * @Route("/add", name="add_client")
     */
    public function add() {

        $client = new client(); 
        $form = $this->createForm(ClientType::class, $client); // va permettre de créer un formulaire.

        return $this->render("client/add.html.twig", [
            'formClient' => $form->createView()
        ]);
    }
}
