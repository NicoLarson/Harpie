<?php

namespace App\Controller;

use App\Entity\CadreLegal;
use App\Entity\Etat;
use App\Entity\Cible;
use App\Entity\Force;
use App\Entity\Effectif;
use App\Entity\FicheODE;
use App\Entity\Demandeur;
use App\Entity\Manoeuvre;
use App\Entity\Transport;
use App\Entity\TypeMission;
use Doctrine\ORM\Mapping\Entity;
use App\Entity\EffectifCategorie;
use App\Entity\ManoeuvreParMission;
use App\Entity\CommunicationParMission;
use App\Repository\FicheODERepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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
     * @Route("/fiches_bilan", name="fiches_bilan")
     */
    public function fichesBilan(FicheODERepository $ficheODERepository): Response
    {
        $fiches = $ficheODERepository->findAll();
        return $this->render('harpie/fiches_bilan.html.twig', [
            'fiches' => $fiches,
        ]);
    }
    /**
     * @Route("/fiche_bilan/{id}", name="fiche_bilan")
     */
    public function ficheBilan(FicheODERepository $ficheODERepository, $id): Response
    {
        $fiche = $ficheODERepository->find($id);
        return $this->render('harpie/fiche_bilan.html.twig', [
            'fiche' => $fiche,
        ]);
    }


    /**
     * @Route("/creation_mission", name="creation_mission")
     */
    public function creationMission(Request $request, EntityManagerInterface $manager): Response
    {

        $ficheODE = new FicheODE();
        $formFicheODE = $this->createFormBuilder($ficheODE)
            // TODO: Ajouter les champs de la fiche ODE 
            // - id demandeur
            ->add(
                'demandeur',
                EntityType::class,
                [
                    'class' => Demandeur::class,
                    'choice_label' => 'numeroIdentifiantGendarme',
                    'choice_value' => 'id',
                    'label' => 'Demandeur',
                    'placeholder' => 'Choisissez un demandeur',
                    'attr' => [
                        'class' => 'form-group',
                    ],
                ]
            )
            // - type de mission
            ->add(
                'typeMission',
                EntityType::class,
                [
                    'class' => TypeMission::class,
                    'choice_label' => 'libelle',
                    'choice_value' => 'id',
                    'label' => 'Type de mission',
                    'placeholder' => 'Choisissez un type de mission',
                    'attr' => [
                        'class' => 'form-group',
                    ],
                ]
            )
            // - force
            ->add('force', EntityType::class, [
                'class' => Force::class,
                'choice_label' => 'libelle',
                'choice_value' => 'id',
                'label' => 'Force',
                'attr' => [
                    'placeholder' => 'Force',
                ],
            ])
            // - denomination operation
            // TODO Générer automatiquement à partir des données du formulaire
            ->add('denominationOperation', TextareaType::class, [
                'label' => 'Denomination de l\'opération',
                'attr' => [
                    'placeholder' => 'Denomination de l\'opération',
                    'readonly' => 'readonly',
                ],
            ])

            // - date debut
            ->add('dateDebut', DateType::class, [
                'label' => 'Date de début',
                'widget' => 'single_text',
                'attr' => [
                    'placeholder' => 'Date de début',
                ],
            ])
            // - date fin
            ->add('dateFin', DateType::class, [
                'label' => 'Date de fin',
                'widget' => 'single_text',
                'attr' => [
                    'placeholder' => 'Date de fin',
                ],
            ])
            // - cibles // TODO : Formulaire pour ajouter plusieurs cibles
            // - effectifs // TODO : Formulaire pour ajouter plusieurs effectifs
            // - effectifs piroguier // TODO : Formulaire pour ajouter plusieurs effectifs
            //     - total effectifs // TODO : TOTAL DES EFFECTIFS
            // - transport // TODO : Formulaire pour ajouter plusieurs transports
            //     - appui feu // TODO : Ajouter appuis feu ou non
            ->add('transportParMissions')

            // - manoeuvre // TODO : Formulaire pour ajouter plusieurs manoeuvres
            //     - mission 
            //     - execution

            // - cadre légal
            ->add('cadreLegal', EntityType::class, [
                'class' => CadreLegal::class,
                'choice_label' => 'libelle',
                'choice_value' => 'id',
                'label' => 'Cadre légal',
            ])
            // - observation
            ->add('observation', TextareaType::class, [
                'label' => 'Observation',
                'attr' => [
                    'placeholder' => 'Observation',
                ],
            ])
            // - communication // TODO : Formulaire pour ajouter plusieurs communications
            ->add('communicationParMissions')


            ->add('etat', EntityType::class, [
                'class' => Etat::class,
                'choice_label' => 'libelle',
                'choice_value' => 'id',
                'label' => 'Etat',
                'attr' => [
                    'placeholder' => 'Etat',
                ],
            ])
            // - BTN valider
            ->add('soumettre', SubmitType::class, ['label' => 'Soumettre', 'attr' => ['class' => 'btn btn-validation']])
            ->getForm();

        $formFicheODE->handleRequest($request);

        if ($formFicheODE->isSubmitted() && $formFicheODE->isValid()) {
            $ficheODEDTO = $formFicheODE->getData();
            // TODO: Le numéro de mission sera généré automatiquement
            // - id demandeur // TODO : Ajouter le numéro de demandeur qui est connecté
            $ficheODE->setDemandeur($ficheODEDTO->getDemandeur());
            // - type de mission
            $ficheODE->setTypeMission($ficheODEDTO->getTypeMission());
            // - force
            $ficheODE->setForce($ficheODEDTO->getForce());
            // - n de mission
            $ficheODE->setNumeroMission("123123123");
            // - date de demande
            $ficheODE->setDateDemande(new \DateTime());
            // - denomination operation 
            // TODO Générer automatiquement à partir des données du formulaire
            $ficheODE->setDenominationOperation('test');
            // - date debut
            $ficheODE->setDateDebut($ficheODEDTO->getDateDebut());
            // - date fin
            $ficheODE->setDateFin($ficheODEDTO->getDateFin());
            // - cibles

            // - effectifs
            // - effectifs piroguier
            //     - total effectifs
            // - transport
            //     - appui feu
            // - manoeuvre
            //     - mission
            //     - execution
            // - cadre légal
            $ficheODE->setCadreLegal($ficheODEDTO->getCadreLegal());
            // - observation
            $ficheODE->setObservation($ficheODEDTO->getObservation());
            // - communication
            // - BTN valider            
            $ficheODE->setEtat($ficheODEDTO->getEtat());
            $manager->persist($ficheODE);
            $manager->flush();
            if ($ficheODEDTO->getDateDebut() > $ficheODEDTO->getDateFin()) {
                $this->addFlash('danger', 'La date de début doit être inférieure à la date de fin');
            } else {

                return $this->redirectToRoute('menu');
            }
        }

        return $this->render('harpie/creation_mission.html.twig', [
            'controller_name' => 'HarpieController',
            'formFicheODE' => $formFicheODE->createView(),
        ]);
    }
}
