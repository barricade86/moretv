<?php

namespace App\Component\Tree;

/**
 * Класс для рисования дерева в Svg
 *
 * @author Kirill Shilov
 */
class SvgTree implements Tree
{
    /**
     * @var string $json JSON-строка
     */
    private $json;

    /**
     * Конструктор.
     *
     * @param string $json JSON-строка
     */
    public function __construct(string $json)
    {
        $this->json = $json;
    }

    /**
     * {@inheritDoc}
     */
    public function create(): string
    {
        $jsonToArray = \json_decode($this->json, true);

        return $this->convert($jsonToArray);
    }

    /**
     * Производит преобразование массива
     *
     * @param array $jsonAsArray JSON-строка, преобразованная к массиву
     *
     * @return string Массив строк
     */
    private function convert(array $jsonAsArray): string
    {
        $result = "<ul>";
        foreach ($jsonAsArray as $key => $value) {
            if (is_array($value)) {
                $result.= $this->convert($value);
            } else {
                $result.= "<li>" . $key . ": " . $value . "</li>";
            }
        }

        $result.="</ul>";

        return $result;
    }
}