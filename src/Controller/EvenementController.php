<?php

namespace App\Controller;

use App\Repository\EvenementRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class EvenementController extends AbstractController
{
    #[Route('/evenement', name: 'evenement')]
    public function index(EvenementRepository $evenementRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $data = $evenementRepository->findAll();

        $evenements = $paginator->paginate($data, $request->query->getInt('page',1), 5);

        return $this->render('evenement/index.html.twig', [
            'evenements' => $evenements,
        ]);
    }
}
