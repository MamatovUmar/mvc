<?php

namespace app\core;

class Pagination extends Model
{
    public static $pageSize;
    public static $totalPage;
    public static $count;
    public static $currentPage;
    public static $prevText = '<<';
    public static $nextText = '>>';

    public static function init($data, $page = 1, $pageSize = 10)
    {
        static::$pageSize = $pageSize;
        $page = intval($page);
        
        static::$count = count($data);
        static::$totalPage = ceil(static::$count / static::$pageSize);

        if(empty($page) or $page < 0) $page = 1;
        if($page > static::$totalPage) $page = static::$totalPage;
        static::$currentPage = $page;

        $index = $page - 1;

        $chunk = array_chunk($data, static::$pageSize);
        return [
            'data' => $chunk[$index],
            'pageSize' => static::$pageSize,
            'currentPage' => $page,
            'totalPage' => static::$totalPage
        ];
    }

    public static function widget()
    {
        if(static::$totalPage > 1)
        {
            return "<ul class=\"pagination\">" . static::prev() . static::pager() . static::next() . "</ul>"; 
        }
        
    }

    public static function prev()
    {
        if (1 >= static::$currentPage)
        {
            return "<li class=\"page-item disabled\"><span class=\"page-link\">". static::$prevText ."</span></li>";
        }else{
            return "<li class=\"page-item\"><a class=\"page-link\" href=\"/news?page=". ((int)static::$currentPage - 1) ."\">". static::$prevText ."</a></li>";
        }
    }

    public static function next()
    {
        if (static::$totalPage > static::$currentPage)
        {
            return "<li class=\"page-item\"><a class=\"page-link\" href=\"/news?page=". ((int)static::$currentPage + 1) ."\">". static::$nextText ."</a></li>";
        }else{
            return "<li class=\"page-item disabled\"><span class=\"page-link\">". static::$nextText ."</span></li>";
        }
    }

    public static function pager()
    {
        $links = '';
        for ($i = 1; $i <= intval(static::$totalPage); $i++)
        {
            if ($i !== static::$currentPage)
            {
                $links .= "<li class=\"page-item\"><a class=\"page-link\" href=\"/news?page=". $i ."\">". $i ."</a></li>";
            }else{
                $links .= "<li class=\"page-item active\" aria-current=\"page\"><span class=\"page-link\">". $i ."<span class=\"sr-only\">(current)</span></span></li>";
            }
        }
        return $links;

    }
}