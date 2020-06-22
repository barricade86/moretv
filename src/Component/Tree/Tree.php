<?php

namespace App\Component\Tree;

/**
 * Интерфейс для рисования древовидной структуры
 *
 * @author Kirill Shilov
 */
interface Tree {
    /**
     * Рисует дерево
     */
    public function create(): string;
}