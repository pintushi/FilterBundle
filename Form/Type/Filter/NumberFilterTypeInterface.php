<?php

namespace Pintushi\Bundle\FilterBundle\Form\Type\Filter;

interface NumberFilterTypeInterface
{
    const TYPE_GREATER_EQUAL = 'gte';
    const TYPE_GREATER_THAN  = 'gt';
    const TYPE_EQUAL         = 'equal';
    const TYPE_NOT_EQUAL     = 'ne';
    const TYPE_LESS_EQUAL    = 'lte';
    const TYPE_LESS_THAN     = 'lt';

    const TYPE_IN            = 'in';
    const TYPE_NOT_IN        = 'not_in';

    const DATA_INTEGER = 'data_integer';
    const DATA_DECIMAL = 'data_decimal';
    const PERCENT      = 'percent';

    const ARRAY_TYPES = [self::TYPE_IN, self::TYPE_NOT_IN];
}
