<?php

namespace App\Enums;

enum PostType: string {
    case News = 'news';
    case Article = 'article';
    case Event = 'event';

    public static function getValues(): array
    {
        return array_column(PostType::cases(), 'value');
    }
}
