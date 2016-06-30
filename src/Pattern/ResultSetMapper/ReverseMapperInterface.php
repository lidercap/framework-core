<?php

namespace Lidercap\Core\Pattern\ResultSetMapper;

/**
 * Interface ReverseMapperInterface
 */
interface ReverseMapperInterface
{
    /**
     * @param mixed $data
     *
     * @return mixed
     */
    public function reverseMap($data);
}
