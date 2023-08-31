<?php

namespace Core\Http;

use Core\Support\Path;

class View
{
    public $page;
    public Response $response;

    public static function page($page, $params = [])
    {
        $subject = self::getviewcontent($page,  $params);
        $baseCss = self::getbaseCss();
        $pageCss = self::getPageCss($page);
        $baseJs = self::getbaseJs();
        $pageJs = self::getPageJs($page);
        $search = ['{{baseLinkCss}}', '{{baseLinkJs}}', '{{PageCss}}', '{{PageJs}}'];
        $replace = [$baseCss,  $baseJs, $pageCss,  $pageJs];
        echo str_replace($search, $replace, $subject);
    }
    public static function getviewcontent($page,  $data)
    {
        ob_start();
        $data;
        include path::view_path() . $page . '.php';
        return ob_get_clean();
    }

    public static function getbaseCss()
    {
        ob_start();
        include path::css_path() . 'baseCss.php';
        return ob_get_clean();
    }
    public static function getbaseJs()
    {
        ob_start();
        include path::js_path() . 'baseJs.php';
        return ob_get_clean();
    }
    public static function getPageCss($page)
    {
        if (file_exists(path::css_path() . $page . '.php')) {
            ob_start();
            include path::css_path() . $page . '.php';
            return ob_get_clean();
        }
    }
    public static function getPageJs($page)
    {
        if (file_exists(path::js_path() . $page . '.php')) {
            ob_start();
            include path::js_path() . $page . '.php';
            return ob_get_clean();
        }
    }
}
