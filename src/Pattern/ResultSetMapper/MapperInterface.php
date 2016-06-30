<?php

namespace Lidercap\Core\Pattern\ResultSetMapper;

/**
 * Interface MapperInterface
 */
interface MapperInterface
{
    /**
     * @param mixed $data
     *
     * @return mixed
     */
    public function map($data);
}
