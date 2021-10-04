<?php

namespace App\Controller;

use App\Entity\Evenement;
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
        $data = $evenementRepository->findBy([], ['id' => 'DESC']);

        $evenements = $paginator->paginate($data, $request->query->getInt('page', 1), 5);

        return $this->render('evenement/index.html.twig', [
            'evenements' => $evenements,
        ]);
    }

    #[Route('/evenement/{slug}', name: 'evenement-details')]
    public function detail(Evenement $evenement): Response
    {
        return $this->render('evenement/details.html.twig', [
            'evenement' => $evenement,
        ]);
    }
}
