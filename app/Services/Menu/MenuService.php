<?php

namespace App\Services\Menu;

class MenuService
{
    public static function item(string $name): MenuItem
    {
        return new MenuItem($name);
    }

    public static function user(bool $responsive = false): string
    {
        $config = [
            self::item('Главная')->route('index')->icon('home'),
            self::item('Вопросы')->resource('question')->icon('question'),
            self::item('Статьи')->resource('article')->icon('file-alt'),
        ];


        $template = $responsive ? 'components.responsive-nav-link' : 'components.nav-link';
        $html = '';
        foreach ($config as $item) {
            $html .= $item->view($template);
        }

        return $html;
    }
}
