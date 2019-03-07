<?php

namespace Pintushi\Bundle\FilterBundle\Form\Type\Filter;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChoiceFilterType extends AbstractChoiceType
{
    const TYPE_CONTAINS     = 1;
    const TYPE_NOT_CONTAINS = 2;
    const NAME              = 'pintushi_filter_choice_filter';

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return self::NAME;
    }

    /**
     * {@inheritDoc}
     */
    public function getParent()
    {
        return FilterType::class;
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $choices = [
            $this->translator->trans('pintushi.filter.form.label_type_contains') => self::TYPE_CONTAINS,
            $this->translator->trans('pintushi.filter.form.label_type_not_contains') => self::TYPE_NOT_CONTAINS,
        ];

        $resolver->setDefaults(
            [
                'field_type'       => ChoiceType::class,
                'field_options'    => array(),
                'operator_choices' => $choices,
                'populate_default' => false,
                'default_value'    => null,
                'null_value'       => null,
                'class'            => null
            ]
        );
    }

    /**
     * {@inheritDoc}
     */
    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        parent::finishView($view, $form, $options);
        if (isset($options['populate_default'])) {
            $view->vars['populate_default'] = $options['populate_default'];
            $view->vars['default_value']    = $options['default_value'];
        }
        if (!empty($options['null_value'])) {
            $view->vars['null_value'] = $options['null_value'];
        }

        if (!empty($options['class'])) {
            $view->vars['class'] = $options['class'];
        }
    }
}
