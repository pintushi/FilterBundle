<?php

namespace Pintushi\Bundle\FilterBundle\Form\Type\Filter;

use Pintushi\Bundle\FilterBundle\Filter\FilterUtility;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\TranslatorInterface;

class TextFilterType extends AbstractType
{
    const TYPE_CONTAINS     = 'contains';
    const TYPE_NOT_CONTAINS = 'not_contains';
    const TYPE_EQUAL        = 'equal';
    const TYPE_STARTS_WITH  = 'starts_with';
    const TYPE_ENDS_WITH    = 'ends_with';
    const TYPE_IN           = 'in';
    const TYPE_NOT_IN       = 'not_in';

    const NAME              = 'pintushi_filter_text_filter';

    /**
     * @var TranslatorInterface
     */
    protected $translator;

    /**
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
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
            $this->translator->trans('pintushi.filter.form.label_type_equals') => self::TYPE_EQUAL,
            $this->translator->trans('pintushi.filter.form.label_type_start_with') => self::TYPE_STARTS_WITH,
            $this->translator->trans('pintushi.filter.form.label_type_end_with') => self::TYPE_ENDS_WITH,
            $this->translator->trans('pintushi.filter.form.label_type_in') => self::TYPE_IN,
            $this->translator->trans('pintushi.filter.form.label_type_not_in') => self::TYPE_NOT_IN,
            $this->translator->trans('pintushi.filter.form.label_type_empty') => FilterUtility::TYPE_EMPTY,
            $this->translator->trans('pintushi.filter.form.label_type_not_empty') => FilterUtility::TYPE_NOT_EMPTY,
        ];

        $resolver->setDefaults(
            [
                'field_type'       => TextType::class,
                'operator_choices' => $choices,
            ]
        );
    }
}
