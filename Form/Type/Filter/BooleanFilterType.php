<?php

namespace Pintushi\Bundle\FilterBundle\Form\Type\Filter;

use Symfony\Component\OptionsResolver\OptionsResolver;

class BooleanFilterType extends AbstractChoiceType
{
    const TYPE_YES = 1;
    const TYPE_NO  = 2;
    const NAME     = 'pintushi_filter_boolean_filter';

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
        return ChoiceFilterType::class;
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $fieldChoices = [
            $this->translator->trans('pintushi.filter.form.label_type_yes') => self::TYPE_YES,
            $this->translator->trans('pintushi.filter.form.label_type_no') => self::TYPE_NO,
        ];

        $resolver->setDefaults(
            [
                'field_options' => [
                    'choices' => $fieldChoices,
                ],
            ]
        );
    }
}
