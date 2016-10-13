<?php

namespace Lidercap\Core\Pattern\ResultSetMapper;

/**
 * Pattern Mapper.
 *
 * @link https://en.wikipedia.org/wiki/Data_mapper_pattern
 */
interface MapperInterface
{
    /**
     * @param mixed $data
     *
     * @throws \InvalidArgumentException
     *
     * @return mixed
     */
    public function map($data);
}
