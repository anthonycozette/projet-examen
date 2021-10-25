<?php

namespace App\Controller;

use DateTime;
use App\Entity\Evenement;
use App\Form\CreationEvenementType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;

class CreationEvenementController extends AbstractController
{
    private $slugger;
    private $security;

    public function __construct(SluggerInterface $slugger, Security $security)
    {
        // $this->slugger = $slugger;
        $this->security = $security;
    }

    #[Route('/creation/evenement', name: 'creation_evenement')]
    public function index(Request $request,): Response
    {
        $createEvenement = new Evenement();
        $form = $this->createForm(CreationEvenementType::class, $createEvenement);
        $form->handleRequest($request);
        $createEvenement->setcreatedAt(new \DateTime('now'));
        // $createEvenement->setSlug($this->slugger->slug($createEvenement->getNom()));
        $createEvenement->setUser($this->security->getUser());
        // $createEvenement->setSlug($slug);
        // $createEvenement->setUser($user);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($createEvenement);
            $entityManager->flush();

            return $this->redirectToRoute('creation_evenement', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('creation_evenement/index.html.twig', [
            'form' => $form,
        ]);
    }

}
