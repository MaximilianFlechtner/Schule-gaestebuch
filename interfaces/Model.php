<?php


interface Model
{
    public static function getAll();
    public static function update($id);
    public static function delete($id);
    public function create();
}