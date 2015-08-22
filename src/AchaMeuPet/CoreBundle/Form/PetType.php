<?php

namespace AchaMeuPet\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PetType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('breed')
            ->add('age')
            ->add('color')
            ->add('weight')
            ->add('width')
            ->add('height')
            ->add('lostDate')
            ->add('updatedAt')
            ->add('pictureFile', 'vich_image', array(
        'required'      => true,
        'allow_delete'  => true, // not mandatory, default is true
        'download_link' => true, // not mandatory, default is true
    ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AchaMeuPet\CoreBundle\Entity\Pet'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'achameupet_corebundle_pet';
    }
}
