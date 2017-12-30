<?php

use Kumbia\ActiveRecord\Paginator;

class Paginate
{
    /**
     * create.
     *
     * @param Paginator $model
     * @param string    $path
     * @param bool      $headers
     *
     * @return string
     */
    public static function create(Paginator $model, $path, $headers = true)
    {
        // if (!$model instanceof Kumbia\ActiveRecord\Paginator) {
        //     return;
        // }
        $headers = '';
        if ($nextPage = $model->nextPage()) {
            echo "<a href=\"{$path}page/$nextPage\" class=\"chip\"> < Older posts</a>";
            $headers = '<link rel="next" href="'."{$path}page/$nextPage".'">';
        }

        if ($prevPage = $model->prevPage()) {
            echo '<a href="',$path, $prevPage === 1 ? '' : 'page/'.$prevPage,'" class="chip u-pull-right">Newer posts → </a>';
            $headers .= '<link rel="prev" href="'."{$path}".($prevPage === 1 ? '' : "page/$prevPage").'">';
        }

        return $headers;
    }

    protected static function headers($link, $dir)
    {
    }
}
