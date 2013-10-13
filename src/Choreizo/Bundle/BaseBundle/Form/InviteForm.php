<?php
namespace Choreizo\Bundle\BaseBundle\Form;
use Choreizo\Bundle\BaseBundle\Form\ApiForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InviteForm extends ApiForm
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Choreizo\Bundle\BaseBundle\Entity\User',
                'csrf_protection' => false
            )
        );
    }

    public function getName()
    {
        return '';
    }
}
