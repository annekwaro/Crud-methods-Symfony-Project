<?php

namespace App\Controller;

use App\Repository\PersonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonController extends AbstractController
{
    #[Route('/person', name: 'app_person')]
    public function index(PersonRepository $posts): Response
    {
        dd($posts->findAll());

        return $this->render('person/index.html.twig', [
            'controller_name' => 'PersonController',
        ]);
    }

    #[Route('/person/post/{id}', name: 'app_person_show')]
    public function showOne(PersonRepository $posts, $id): Response
    {
        dd($posts->find($id));
        return $this->render('person/show.html.twig', [
            'controller_name' => 'PersonController',
        ]);
    }


}