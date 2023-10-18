<?php

namespace Core\Http;

use Core\Application;
use Core\Support\Path;

class View
{
    public $page;
    public static $session;

    public static function page($page, $params = [])
    {
        $csrf_value = self::$session = Application::$app->session->get('_token');
        $subject = self::getviewcontent($page,  $params);
        $csrf_input = '<input type="hidden" name="_token" id="_token" value="' . $csrf_value . '">';
        $baseCss = self::getbaseCss();
        $pageCss = self::getPageCss($page);
        $baseJs = self::getbaseJs();
        $pageJs = self::getPageJs($page);
        $search = ['{{baseLinkCss}}','@csrf', '{{baseLinkJs}}', '{{PageCss}}', '{{PageJs}}'];
        $replace = [$baseCss,$csrf_input,  $baseJs, $pageCss,  $pageJs];
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
