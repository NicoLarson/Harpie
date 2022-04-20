<?php

namespace App\Form;

use App\Entity\FicheODE;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FicheODEType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('force',)
            ->add('numeroMission', TextType::class, [
                'label' => 'Numéro de mission',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Numéro de mission',
                ],
            ])
            ->add('dateDemande', DateType::class, [
                'format' => 'dd/MM/yyyy',
            ])
            ->add('denominationOperation')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('observation')
            ->add('demandeur')
            ->add('typeMission')

            ->add('etat')
            ->add('cadreLegal')
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->add('saveAndAdd', SubmitType::class, ['label' => 'Save and Add']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FicheODE::class,
        ]);
    }
}
