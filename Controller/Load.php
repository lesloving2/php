<?php
class Load
{
    public function __construct()
    {
    }

    public function view($file, $data = NULL)
    {
        include 'Views/' . $file . '.php';
    }

    public function model($file)
    {
        include 'Model/' . $file . '.php';
        return new $file;
    }
}
