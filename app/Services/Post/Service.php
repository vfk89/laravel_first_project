<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($data)
    {
        $tags = $data['tags'] ?? [];
        unset($data['tags']);
        $tags = array_filter($tags, function($tag) {
            return !empty($tag) && is_numeric($tag);
        });
        $post = Post::create($data);
        $post->tags()->attach($tags);
        return $post; // Возвращаем созданный пост
    }

    public function update($post, $data)
    {
        // Получаем массив тегов или устанавливаем пустой массив, если теги не выбраны
        $tags = $data['tags'] ?? [];
        // Удаляем ключ 'tags' из данных, которые будут использоваться для обновления поста
        unset($data['tags']);
        // Если есть выбранные теги, синхронизируем их
        if (!empty($tags)) {
            // Фильтруем теги, чтобы исключить возможные пустые строки или некорректные значения
            $tags = array_filter($tags, 'is_numeric');
            // Синхронизируем теги с постом
            $post->tags()->sync($tags);
        } else {
            // Если теги не выбраны, отсоединяем все текущие теги от поста
            $post->tags()->detach();
        }
        // Обновляем остальные данные поста
        $post->update($data);
    }
}
