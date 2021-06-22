<?php


namespace App\Services\Menu;


class MenuItem
{
    public string $name, $icon, $prefix, $url, $onclick;
    public array $items = [];
    public bool $changeable = false;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function route($route): MenuItem
    {
        $this->url = route($route);
        $this->prefix($route.'*');
        return $this;
    }

    public function resource($resource): MenuItem
    {
        $this->url = route($resource.'.index');
        $this->prefix($resource.'*');
        return $this;
    }

    public function url($link): MenuItem
    {
        $this->url = $link;
        $this->prefix($link);
        return $this;
    }

    public function icon($icon): MenuItem
    {
        $this->icon = $icon;
        return $this;
    }

    public function prefix($prefix): MenuItem
    {
        $this->prefix = $prefix;
        return $this;
    }

    public function changeable(): MenuItem
    {
        $this->changeable = true;
        return $this;
    }

    public function onclick(string $action): MenuItem
    {
        $this->onclick = $action;
        return $this;
    }

    public function view(string $template): string
    {
        return view($template, ['item' => $this])->render();
    }

    public function attach(MenuItem|array $items): MenuItem
    {
        if (is_array($items)) {
            $this->items = array_merge($this->items, $items);
        } else {
            $this->items[] = $items;
        }

        return $this;
    }

    public function __serialize(): array
    {
        return [
            'icon'      => $this->icon,
            'name'      => $this->name,
            'prefix'    => $this->prefix,
            'url'       => $this->url,
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->icon     = $data['icon'];
        $this->name     = $data['name'];
        $this->prefix   = $data['prefix'];
        $this->url      = $data['url'];
    }
}
