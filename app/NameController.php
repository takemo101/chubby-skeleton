<?php

namespace App;

class NameController
{
    /**
     * Hello to you
     *
     * @param string $name
     * @return string
     */
    public function hello(string $name): string
    {
        return "Hello, {$name}!";
    }
}
