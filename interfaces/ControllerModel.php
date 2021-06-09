<?php


interface ControllerModel
{
    public static function start($file);

    public static function create($file, array $post);

    public static function delete($file, array $post);

    public static function update($file, array $post);
}