<?php
namespace Choreizo\Bundle\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Form for tickets in the API
 */
class ChoreForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            //->add('target_user')
            ->add('deadline', 'datetime', array(
                'widget' => 'single_text',
            ))
            ->add('fine_amount');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Choreizo\Bundle\BaseBundle\Entity\Chore',
                'csrf_protection' => false
            )
        );
    }

    public function getName()
    {
        return '';
    }
}
