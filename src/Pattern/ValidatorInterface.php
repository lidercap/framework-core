<?php

namespace Lidercap\Core\Pattern;

interface ValidatorInterface
{
    /**
     * @throws \InvalidArgumentException
     */
    public function validate();
}
