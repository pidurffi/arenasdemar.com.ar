<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use MdlpBundle\Entity\Repository\EstablecimientoRepository;

class PerfilType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $user = $builder->getData();
        $builder->add('nombre');
        $builder->add('apellido');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }
    
    
}