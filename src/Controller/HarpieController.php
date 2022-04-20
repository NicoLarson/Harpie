<?php

namespace App\Controller;

use App\Entity\Cible;
use App\Entity\Force;
use App\Entity\Effectif;
use App\Entity\FicheODE;
use App\Entity\Demandeur;
use App\Entity\Manoeuvre;
use App\Entity\Transport;
use App\Entity\TypeMission;
use App\Entity\EffectifCategorie;
use App\Entity\ManoeuvreParMission;
use App\Entity\CommunicationParMission;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HarpieController extends AbstractController
{
    /**
     * @Route("/", name="menu")
     */
    public function index(): Response
    {
        return $this->render('harpie/index.html.twig', [
            'controller_name' => 'HarpieController',
        ]);
    }

    /**
     * @Route("/choix_type_mission", name="choix_type_mission")
     */
    public function choixTypeMission(): Response
    {
        return $this->render('harpie/choix_type_mission.html.twig', [
            'controller_name' => 'HarpieController',
        ]);
    }

    /**
     * @Route("/creation_mission", name="creation_mission")
     */
    public function creationMission(Request $request, EntityManagerInterface $manager): Response
    {
        $typeMission = $_GET['type_mission'];

        $ficheODE = new FicheODE();
        $formFicheODE = $this->createFormBuilder($ficheODE)
            ->add('typeMission', EntityType::class, [
                'class' => TypeMission::class,
                'choice_label' => 'libelle',
                'label' => 'Type de mission',
                'attr' => [
                    'placeholder' => 'Type de mission',
                ],
            ])
            ->add(
                'demandeur',
                EntityType::class,
                [
                    'class' => Demandeur::class,
                    'choice_label' => 'id',
                    'label' => 'Demandeur',
                    'placeholder' => 'Choisissez un demandeur',
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add('force', EntityType::class, [
                'class' => Force::class,
                'choice_label' => 'id',
                'label' => 'Force',
                'attr' => [
                    'placeholder' => 'Force',
                ],
            ])
            ->add('etat', EntityType::class, [
                'class' => Cible::class,
                'choice_label' => 'id',
                'label' => 'Etat',
                'attr' => [
                    'placeholder' => 'Etat',
                ],
            ])
            ->add('dateDebut')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('cadreLegal')
            ->add('observation')
            ->add('communicationParMissions')
            ->add('transportParMissions')
            ->add('force')
            ->add('dateDemande')
            ->add('soumettre', SubmitType::class, ['label' => 'Soumettre', 'attr' => ['class' => 'btn btn-validation']])
            ->getForm();

        $formFicheODE->handleRequest($request);

        if ($formFicheODE->isSubmitted() && $formFicheODE->isValid()) {
            $ficheODEDTO = $formFicheODE->getData();
            $ficheODE->setDateDemande(new \DateTime());
            $ficheODE->setDateDebut(new \DateTime());
            $ficheODE->setDateFin(new \DateTime());
            $ficheODE->setDemandeur($ficheODEDTO->getDemandeur());
            $ficheODE->setForce($ficheODEDTO->getForce());
            $ficheODE->setEtat($ficheODEDTO->getEtat());
            $manager->persist($ficheODE);
            $manager->flush();

            $this->addFlash('success', 'Votre article a été ajouté.');
            return $this->redirectToRoute('creation_mission');
        }

        return $this->render('harpie/creation_mission.html.twig', [
            'controller_name' => 'HarpieController',
            'typeMission' => $typeMission,

            'formFicheODE' => $formFicheODE->createView(),
            // 'formCible' => $formCible->createView(),
            // 'formForce' => $formForce->createView(),
            // 'formEffectif' => $formEffectif->createView(),
            // 'formEffectifPiroguier' => $formEffectifPiroguier->createView(),
            // 'formTransport' => $formTransport->createView(),
            // 'formManoeuvreParMission' => $formManoeuvreParMission->createView(),
            // 'formCommunicationParMission' => $formCommunicationParMission->createView(),
        ]);
    }
}


   // $cible = new Cible();
        // $formCible = $this->createFormBuilder($cible)
        //     ->add('latitudeN')
        //     ->add('longitudeO')
        //     ->add('libelle')
        //     ->add('Valider', SubmitType::class, ['label' => 'Valider', 'attr' => ['class' => 'btn btn-validation-popup']])
        //     ->getForm();

        // $force = new Force();
        // $formForce = $this->createFormBuilder($force)
        //     ->add('libelle')
        //     ->getForm();

        // $effectif = new Effectif();
        // $formEffectif = $this->createFormBuilder($effectif)
        //     ->add('effectifCategorie')
        //     ->add('effectifSousCategorie')
        //     ->add('volume')
        //     ->add('Valider', SubmitType::class, ['label' => 'Valider', 'attr' => ['class' => 'btn btn-validation-popup']])
        //     ->getForm();

        // $effectifPiroguier = new Effectif();
        // $formEffectifPiroguier = $this->createFormBuilder($effectifPiroguier)
        //     ->add('effectifCategorie')
        //     ->add('effectifSousCategorie')
        //     ->add('volume')
        //     ->add('Valider', SubmitType::class, ['label' => 'Valider', 'attr' => ['class' => 'btn btn-validation-popup']])
        //     ->getForm();

        // $transport = new Transport();
        // $formTransport = $this->createFormBuilder($transport)
        //     ->add('categorie')
        //     ->add('sousCategorie')
        //     ->add('appuiFeu')
        //     ->add('Valider', SubmitType::class, ['label' => 'Valider', 'attr' => ['class' => 'btn btn-validation-popup']])
        //     ->getForm();

        // $manoeuvreParMission = new ManoeuvreParMission();
        // $formManoeuvreParMission = $this->createFormBuilder($manoeuvreParMission)
        //     ->add('manoeuvre')
        //     ->add('execution')
        //     ->add('Valider', SubmitType::class, ['label' => 'Valider', 'attr' => ['class' => 'btn btn-validation-popup']])
        //     ->getForm();

        // $communicationParMission = new CommunicationParMission();
        // $formCommunicationParMission = $this->createFormBuilder($communicationParMission)
        //     ->add('communication')
        //     ->getForm();