<?php

namespace Christopheredjohnson\LaravelFileParser\Parsers;

interface ParserInterface
{
    public static function parse($source, $config = []);
}
