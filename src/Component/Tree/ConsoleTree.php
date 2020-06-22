<?php

namespace App\Component\Tree;

/**
 * Класс для рисования консольного дерева
 *
 * @author Kirill Shilov
 */
class ConsoleTree implements Tree
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
     * {@inheritdoc}
     */
    public function create(): string
    {
        $jsonToArray = \json_decode($this->json, true);

        return $this->convert($jsonToArray);
    }

    /**
     * Производит преобразование JSON-массива в древовидную структуру
     *
     * @param array $jsonAsArray JSON-строка, преобразованная к массиву
     * @param int $offset Смещение
     *
     * @return string JSON-строка представленная в виде дерева
     */
    private function convert(array $jsonAsArray, int $offset = 2): string
    {
        $result = "";
        foreach ($jsonAsArray as $key => $value) {
            if (is_array($value)) {
                $result.= '|' . str_repeat(" ", $offset) . "|" . str_repeat("-", 2) . $key . "\n";
                $result.= '|' . str_repeat(" ", $offset + 3) . "|\n";
                $result.= $this->convert($value, $offset + 3);
            } else {
                $result.= "|" . str_repeat(" ", $offset) . "|" . str_repeat('-', 2) . $key . ": " . $value . "\n";
            }
        }

        return $result;
    }
}
