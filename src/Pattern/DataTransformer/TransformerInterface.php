<?php

namespace Lidercap\Core\Pattern\DataTransformer;

/**
 * Pattern Data Transformer.
 */
interface TransformerInterface
{
    /**
     * @param mixed $data
     *
     * @throws \InvalidArgumentException
     *
     * @return mixed
     */
    public function transform($data);
}
