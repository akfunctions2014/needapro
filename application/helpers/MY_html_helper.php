<?php

function style($path)
{
    $link = strpos($path, "://") > 0 ? $path : base_url($path);
    return "<link href='{$link}' rel='stylesheet' type='text/css' />";
}

function script($path)
{
    $link = strpos($path, "://") > 0 ? $path : base_url($path);
    return "<script src='{$link}'></script>";
}
