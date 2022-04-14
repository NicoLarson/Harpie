<?php

namespace App\Controller;

use App\Entity\FicheODE;
use App\Entity\Demandeur;
use App\Entity\TypeMission;
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
     * @Route("/creation_mission", name="creation_mission")
     */
    public function creationMission(): Response
    {
        $ficheODE = new FicheODE();
        $formFicheODE = $this->createFormBuilder($ficheODE)
            ->add('numeroMission')
            ->add('typeMission')
            ->add('force')
            ->add('dateDemande')
            ->add('denominationOperation')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('cadreLegal')
            ->add('observation')
            ->add('effectifParMissions')
            ->add('effectifPirogierParMissions')
            ->add('communicationParMissions')
            ->add('manoeuvreParMissions')
            ->add('transportParMissions')
            ->add('cibleParMissions')
            ->add('valider', SubmitType::class, ['label' => 'Soumettre', 'attr' => ['class' => 'btn btn-validation']])
            ->getForm();

        $typeMission = new TypeMission();
        $formTypeMission = $this->createFormBuilder($typeMission)
            ->add('libelle')
            ->getForm();

        return $this->render('harpie/creation_mission.html.twig', [
            'controller_name' => 'HarpieController',
            'formFicheODE' => $formFicheODE->createView(),
            'formTypeMission' => $formTypeMission->createView(),
        ]);
    }
}
