<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Форма для загрузки JSON-файла
 *
 * @author Kirill Shilov
 */
class JsonFormType extends AbstractType
{
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('jsonFile', FileType::class, ['mapped' => false])
            ->add('upload', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ]);
        ;
    }
}
