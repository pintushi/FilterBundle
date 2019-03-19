<?php

namespace Pintushi\Bundle\FilterBundle\Form\Type\Filter;

interface NumberRangeFilterTypeInterface extends NumberFilterTypeInterface
{
    const TYPE_BETWEEN          = 'between';
    const TYPE_NOT_BETWEEN      = 'not_between';
}
