<?php

namespace Christopheredjohnson\LaravelFileParser;

use Christopheredjohnson\LaravelFileParser\Parsers\ParserInterface;

class FileParserManager
{
    protected $parsers = [];

    public function registerParser($type, ParserInterface $parser)
    {
        $this->parsers[strtolower($type)] = $parser;
    }

    public function parse($source, $type)
    {
        $type = strtolower($type);

        if (! isset($this->parsers[$type])) {
            throw new \Exception("Unsupported source type: $type");
        }

        return $this->parsers[$type]::parse($source);
    }

    public function getRegisteredParsers()
    {
        return array_keys($this->parsers);
    }
}
