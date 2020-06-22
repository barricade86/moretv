<?php

namespace App\Component\Tree;

/**
 * Контекст
 *
 * @author Kirill Shilov
 */
class Context {
    /**
     * @var Tree Дерево
     */
    private $tree;

    /**
     * Конструктор.
     *
     * @param Tree $tree Дерево
     */
    public function __construct(Tree $tree)
    {
        $this->tree = $tree;
    }

    /**
     * Создает дерево на основе выбранной стратегии
     *
     * @return string Дерево
     */
    public function createTree(): string
    {
        return $this->tree->create();
    }
}