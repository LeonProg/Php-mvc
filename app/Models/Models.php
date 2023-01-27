<?php

namespace App\Models;

class Models
{
    public string $table;

    public function findOne($id) : string
    {
        $contents = \R::findOne($this->table, "id = ?", [$id]);

        if (isset($contents))
        {
            echo $contents;
        }
        return "Нету";
    }

    public function all() : array
    {
        $contents =\R::findCollection($this->table);
        $array = [];
        while ($content = $contents->next())
        {
            $array[] = $content;
        }

        return ($array);
    }
}