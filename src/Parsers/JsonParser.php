<?php

namespace Christopheredjohnson\LaravelFileParser\Parsers;


class JsonParser implements ParserInterface
{
    public static function parse($filePath)
    {
        $content = file_get_contents($filePath);
        return json_decode($content, true);
    }
}
