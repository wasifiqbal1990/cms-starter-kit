<?php

define('PREFIX','assets/rise/');

function jsPath($path, $secure = null)
{
    $path = PREFIX.$path;
    return app('url')->asset($path, $secure);
}

function cssPath($path, $secure = null)
{
    $path = PREFIX.$path;
    return app('url')->asset($path, $secure);
}

function imgPath($path, $secure = null)
{
    $path = PREFIX.$path;
    return app('url')->asset($path, $secure);
}
