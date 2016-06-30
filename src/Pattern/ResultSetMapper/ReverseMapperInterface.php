<?php

namespace Lidercap\Core\Pattern\ResultSetMapper;

/**
 * Pattern Mapper.
 *
 * @link https://en.wikipedia.org/wiki/Data_mapper_pattern
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
