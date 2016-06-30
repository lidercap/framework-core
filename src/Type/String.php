<?php

namespace Lidercap\Core\Type;

/**
 * Core Type String.
 */
class String implements CoreTypeInterface
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

    /**
     * Converte a string em array.
     *
     * @param string $sepatator Separador.
     *
     * @return array
     */
    public function explode($sepatator = ',')
    {
        return @explode($sepatator, $this->value);
    }

    /**
     * Converte um array em string.
     *
     * @param array  $array     Array a ser importado.
     * @param string $sepatator Separador.
     */
    public function join(array $array, $sepatator = ',')
    {
        $this->value = @implode($sepatator, $array);
    }
}
