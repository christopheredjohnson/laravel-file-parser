<?php

namespace Christopheredjohnson\LaravelFileParser\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Christopheredjohnson\LaravelFileParser\LaravelFileParser
 */
class LaravelFileParser extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Christopheredjohnson\LaravelFileParser\LaravelFileParser::class;
    }
}
