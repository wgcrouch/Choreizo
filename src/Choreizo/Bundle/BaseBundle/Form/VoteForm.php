<?php
namespace Choreizo\Bundle\BaseBundle\Form;
use Choreizo\Bundle\BaseBundle\Form\ApiForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VoteForm extends ApiForm
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('positive', 'checkbox');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Choreizo\Bundle\BaseBundle\Entity\Vote',
                'csrf_protection' => false
            )
        );
    }

    public function getName()
    {
        return '';
    }
}
