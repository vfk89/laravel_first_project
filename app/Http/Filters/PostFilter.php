<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const CONTENT = 'content';
    public const CATEGORY_ID = 'category_id';
    public const TAGS = 'tags';
    public const LIKES = 'likes';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CONTENT => [$this, 'content'],
            self::CATEGORY_ID => [$this, 'category_id'],
            self::TAGS => [$this, 'tags'],
            self::LIKES => [$this, 'likes'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function content(Builder $builder, $value)
    {
        $builder->where('content', 'like', "%{$value}%");
    }

    public function category_id(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }

    public function tags(Builder $builder, $value)
    {
        // Фильтрация по тегам
        $builder->whereHas('tags', function ($query) use ($value) {
            $query->whereIn('tags.id', $value);
        });
    }

    public function likes(Builder $builder, $value)
    {
        $builder->where('likes', '=', $value);
    }
}
