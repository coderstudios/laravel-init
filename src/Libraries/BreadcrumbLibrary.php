<?php
/**
 * Part of the Laravel-Init package by Coder Studios.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the terms of the MIT license https://opensource.org/licenses/MIT
 *
 * @version    1.0.0
 *
 * @author     Coder Studios Ltd
 * @license    MIT https://opensource.org/licenses/MIT
 * @copyright  (c) 2020, Coder Studios Ltd
 *
 * @see       https://www.coderstudios.com
 */

namespace CoderStudios\LaravelInit\Libraries;

class BreadcrumbLibrary
{
    protected $items = [];

    public function addBreadcrumb($text, $href = '', $active = '', $separator = ' &gt; ', $group = '')
    {
        if ($group) {
            $this->items[$group][] = [
                'text' => $text,
                'href' => $href,
                'active' => $active,
                'separator' => $separator,
            ];
        } else {
            $this->items[] = [
                'text' => $text,
                'href' => $href,
                'active' => $active,
                'separator' => $separator,
            ];
        }
    }

    public function getBreadcrumbItems($group = '')
    {
        if ($group) {
            $items = $this->items[$group] ?? null;
        } else {
            $items = $this->items ?? null;
        }

        return $items;
    }

    public function getBreadcrumb($group = '')
    {
        $items = $this->getBreadcrumbItems($group);
        if (empty($items) || empty($group)) {
            return null;
        }
        $html = '<nav aria-label="breadcrumb"><ol class="breadcrumb mb-0">';

        foreach ($items as $item) {
            $active = '';
            if (isset($item['active']) && true === $item['active']) {
                $active = 'active';
            }
            $html .= '<li class="breadcrumb-item '.$active.'">';
            if (!empty($item['href'])) {
                $html .= '<a href="'.$item['href'].'">';
            }
            $html .= $item['text'];
            if (!empty($item['href'])) {
                $html .= '</a>';
            }
            $html .= '</li>';
        }
        $html .= '</ol></nav>';

        return $html;
    }
}
