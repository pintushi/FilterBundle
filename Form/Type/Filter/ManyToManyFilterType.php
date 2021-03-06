<?php

namespace Pintushi\Bundle\FilterBundle\Form\Type\Filter;

use Pintushi\Bundle\FilterBundle\Filter\FilterUtility;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\TranslatorInterface;

class ManyToManyFilterType extends AbstractType
{
    const NAME = 'pintushi_filter_many_to_many_filter';

    /** @var TranslatorInterface */
    protected $translator;

    /**
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'operator_choices' => [
                $this->translator->trans('pintushi.filter.form.label_type_empty') => FilterUtility::TYPE_EMPTY,
                $this->translator->trans('pintushi.filter.form.label_type_not_empty') => FilterUtility::TYPE_NOT_EMPTY,
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return ChoiceFilterType::class;
    }

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
        return static::NAME;
    }
}
