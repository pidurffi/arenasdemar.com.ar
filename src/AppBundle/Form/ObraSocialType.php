<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use MdlpBundle\Entity\Repository\ServicioRepository;
use Comur\ImageBundle\Form\Type\CroppableImageType;

class ObraSocialType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
        ->add('nombre')
        ;
        
        $builder->add('imagen',CroppableImageType::class, array(
            'uploadConfig' => array(
                'uploadUrl' => "uploads/obra_social",
                'webDir' => 'uploads/obra_social'
            ),
            'cropConfig' => array(
                'minWidth' => 200,
                'minHeight' => 200
            ),
        ));
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ObraSocial'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_obra_social';
    }


}
