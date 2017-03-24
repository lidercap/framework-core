<?php

namespace Lidercap\Core\Type;

/**
 * Core Type String.
 */
class StringType extends AbstractType
{
    use CoreTypeValueAware;

    /**
     * @return bool
     */
    public function isValid()
    {
        return is_string($this->value);
    }

    /**
     * Verifica se a string possui um determinado conjunto de catacteres.
     */
    public function has($search)
    {
        return !(strpos($this->value, $search) === false);
    }

    /**
     * Verifica se a string bate com a expressáo regular fornecida.
     *
     * @param string $regex
     *
     * @return bool
     */
    public function match($regex)
    {
        return (bool)preg_match($regex, $this->value);
    }

    /**
     * @return int
     */
    public function length()
    {
        return strlen($this->value);
    }

    /**
     * Remove espaços do início e do fim da string.
     *
     * @return string
     */
    public function trim()
    {
        return trim($this->value);
    }

    /**
     * Faz uma substituição de caracteres na string.
     *
     * @param array|string $search
     * @param array|string $replace
     *
     * @return string
     */
    public function replace($search, $replace)
    {
        return str_replace($search, $replace, $this->value);
    }

    /**
     * Converte a string para minúsculas.
     *
     * @return string
     */
    public function lowerCase()
    {
        return strtolower($this->value);
    }

    /**
     * Converte a string para maiúsculas.
     *
     * @return string
     */
    public function upperCase()
    {
        return strtoupper($this->value);
    }

    /**
     * Deixa a string somente com a primeira letra maiúscula.
     *
     * @return string
     */
    public function capitalize()
    {
        return ucfirst(strtolower($this->value));
    }

    /**
     * Garante que o caracter especificado será o primeiro caracter da string.
     *
     * @param string $char
     *
     * @return string
     */
    public function firstChar($char)
    {
        return (substr($this->value, 0, 1) !== $char) ? $char . $this->value : $this->value;
    }

    /**
     * Garante que o primeiro caracter da string NÃO SERÁ o caracter especificado.
     *
     * @param string $char
     *
     * @return string
     */
    public function firstCharIsNot($char)
    {
        return (substr($this->value, 0, 1) === $char) ? substr($this->value, 1) : $this->value;
    }

    /**
     * Garante que o caracter especificado será o último caracter da string.
     *
     * @param string $char
     *
     * @return string
     */
    public function lastChar($char)
    {
        return (substr($this->value, -1) !== $char) ? $this->value . $char : $this->value;
    }

    /**
     * Garante que o último caracter da string NÃO SERÁ o caracter especificado.
     *
     * @param string $char
     *
     * @return string
     */
    public function lastCharIsNot($char)
    {
        return (substr($this->value, -1) === $char) ? substr($this->value, 0, -1) : $this->value;
    }

    /**
     * Trunca a string.
     *
     * @param int    $limit  Tamanho limite da string.
     * @param string $append Caracter a ser apendado ao final.
     *
     * @return string
     */
    public function truncate($limit, $append = '')
    {
        if (strlen($this->value) <= (int)$limit) {
            return $this->value;
        }

        return substr($this->value, 0, (int)$limit) . $append;
    }

    /**
     * Converte a string em array.
     *
     * Caso o separador não esteja presente,
     * então a própria string é retornada.
     *
     * @param string $separator Separador.
     *
     * @return array|string
     */
    public function explode($separator = ',')
    {
        if (!strlen($this->value)) {
            return [];
        }

        if (!$this->has($separator)) {
            return $this->value;
        }

        $value = $this->lastCharIsNot($separator);

        return @explode($separator, $value);
    }

    /**
     * @codeCoverageIgnore
     *
     * Converte a string em array.
     *
     * Caso o separador não esteja presente,
     * então a própria string é retornada.
     *
     * @param string $separator Separador.
     *
     * @return array|string
     */
    public function split($separator = ',')
    {
        return $this->explode($separator);
    }

    /**
     * Converte um array em string.
     *
     * @param array  $array     Array a ser importado.
     * @param string $separator Separador.
     */
    public function join(array $array, $separator = ',')
    {
        $this->value = @implode($separator, $array);
    }

    /**
     * Remove acentuação e caracteres especiais da string.
     *
     * @return string
     */
    public function clear()
    {
        return strtr(
            trim($this->value),
            array(

                /** Bloco do A **/
                'á' => 'a',
                'Á' => 'A',
                'à' => 'a',
                'À' => 'A',
                'â' => 'a',
                'Â' => 'A',
                'ã' => 'a',
                'Ã' => 'A',
                'ä' => 'a',
                'Ä' => 'A',
                /** Bloco do A **/

                /** Bloco do E **/
                'é' => 'e',
                'É' => 'E',
                'è' => 'e',
                'È' => 'E',
                'ê' => 'e',
                'Ê' => 'E',
                'ë' => 'e',
                'Ë' => 'E',
                /** Bloco do E **/

                /** Bloco do I **/
                'í' => 'i',
                'Í' => 'I',
                'ì' => 'i',
                'Ì' => 'I',
                'î' => 'i',
                'Î' => 'I',
                'ĩ' => 'i',
                'Ĩ' => 'I',
                'ï' => 'i',
                'Ï' => 'I',
                /** Bloco do I **/

                /** Bloco do O **/
                'ó' => 'o',
                'Ó' => 'O',
                'ò' => 'o',
                'Ò' => 'O',
                'ô' => 'o',
                'Ô' => 'O',
                'õ' => 'o',
                'Õ' => 'O',
                'ö' => 'o',
                'Ö' => 'O',
                /** Bloco do O **/

                /** Bloco do U **/
                'ú' => 'u',
                'Ú' => 'U',
                'ù' => 'u',
                'Ù' => 'U',
                'û' => 'u',
                'Û' => 'U',
                'ũ' => 'u',
                'Ũ' => 'U',
                'ü' => 'u',
                'Ü' => 'U',
                /** Bloco do U **/

                /** Bloco do Ç **/
                'ç' => 'c',
                'Ç' => 'C',
                /** Bloco do Ç **/

                /** Bloco dos ordinais **/
                'ª' => 'a',
                'º' => 'o',
                '°' => 'o',
                /** Bloco dos ordinais **/
            )
        );
    }
}
