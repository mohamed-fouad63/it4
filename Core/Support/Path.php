<?php

namespace Core\Support;

class Path
{
    public static function view_path()
    {
        return dirname(__DIR__) . '\\..\\views\\';
    }
    public static function layout_path()
    {
        return dirname(__DIR__) . '\\..\\views\\layout\\';
    }
    public static function css_path()
    {
        return dirname(__DIR__) . '\\..\\views\\assets\\css\\';
    }
    public static function js_path()
    {
        return dirname(__DIR__) . '\\..\\views\\assets\\js\\';
    }
}
