<?php

namespace Lidercap\Core\Pattern;

interface ValidatorInterface
{
    /**
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public function validate($value);
}
