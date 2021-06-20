<?php

namespace App\Services;

class MenuService
{
    protected static function getItem(string $name, string $icon = null, string $route = null, string $prefix = null, array $items = [], bool $changeable = false )
    {
        return (object) [
            'name' => $name,
            'icon' => $icon,
            'route' => $route,
            'prefix' => $prefix ?? $route.'*',
            'items' => $items,
            'changeable' => $changeable
        ];
    }

    public static function userNav()
    {
        $config = [
            self::getItem('Главная', 'fa-home', 'index'),
            self::getItem('Вопросы', 'fa-question', 'question.index'),
        ];

        $html = '';
        foreach ($config as $item) {
            $html .= view('components.nav-link', compact('item'));
        }

        return $html;
    }
}
