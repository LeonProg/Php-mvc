<?php

namespace App\Models;

use App\Utils\ErrorConsts;
use RedBeanPHP\OODBBean;

class Models
{
    public string $table;

    /**
     * @param int $id
     * @return OODBBean|string
     */
    public function findOne(int $id) : OODBBean|string
    {
        $contents = \R::findOne($this->table, "id = ? AND status = ? ", [$id,["publish", \PDO::PARAM_STR]]);

        if (isset($contents))
        {
            return $contents;
        }

        return ErrorConsts::REQUEST_ERROR;
    }

    /**
     * @return array
     */
    public function all() :array
    {
        $contents =\R::findCollection($this->table, "status = ?", ["publish"]);
        $array = [];
        while ($content = $contents->next())
        {
            $array[] = $content;
        }

        return ($array);
    }

    /**
     * @param $id
     * @return OODBBean|string
     */
    public function findItem($id) :  OODBBean|string
    {
        $contents = \R::findOne($this->table, "id = ?", [$id]);

        if (isset($contents))
        {
            return $contents;
        }

        return ErrorConsts::REQUEST_ERROR;
    }



}