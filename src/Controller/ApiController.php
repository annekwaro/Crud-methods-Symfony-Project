<?php

namespace App\Controller;

use App\Entity\Person;
use App\Repository\PersonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController
{
    private $em;
    private $personRepository;

    public function __construct(PersonRepository $personRepository, EntityManagerInterface $em)
    {
        $this->personRepository = $personRepository;
        $this->em = $em;
    }
    /**
     * @Route("/api/people", methods={"GET"})
     */
    public function getPeople(): JsonResponse
    {
        $people = $this->em->getRepository(Person::class)->findAll();
        return $this->json($people);
    }

    /**
     * @Route("/api/people/{id}", methods={"GET"})
     */
    public function getPerson(int $id): JsonResponse
    {
        $person = $this->em->getRepository(Person::class)->find($id);
        
        if (!$person) {
            throw $this->createNotFoundException('Person not found');
        }

        return $this->json($person);
    }

    /**
     * @Route("/api/people", methods={"POST"})
     */
    /**
 * @Route("/api/people", methods={"POST"})
 */
public function createPerson(Request $request): JsonResponse
{
    $data = json_decode($request->getContent(), true);

    // Validate the input data
    if (!isset($data['name']) || !isset($data['age'])) {
        return $this->json(['error' => 'Invalid data. Both name and age are required.'], Response::HTTP_BAD_REQUEST);
    }

    $person = new Person();
    $person->setName($data['name']);
    $person->setAge($data['age']);

    $em = $this->getDoctrine()->getManager();
    $em->persist($person);
    $em->flush();

    return $this->json($person, Response::HTTP_CREATED);
}

/**
 * @Route("/api/people/{id}", methods={"PUT"})
 */
public function updatePerson(Request $request, int $id): JsonResponse
{
    $data = json_decode($request->getContent(), true);

    // Validate the input data
    if (!isset($data['name']) || !isset($data['age'])) {
        return $this->json(['error' => 'Invalid data. Both name and age are required.'], Response::HTTP_BAD_REQUEST);
    }

    $person = $this->getDoctrine()->getRepository(Person::class)->find($id);

    if (!$person) {
        throw $this->createNotFoundException('Person not found');
    }

    $person->setName($data['name']);
    $person->setAge($data['age']);

    $em = $this->getDoctrine()->getManager();
    $em->persist($person);
    $em->flush();

    return $this->json($person);
}

}