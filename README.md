Divido Config Parser
====================

![Party!](http://media.giphy.com/media/d6Unw9Ke0vCFO/giphy.gif)

Parse your json config files the cool way!

## Solution

The problem presented was separated into two sub problems:

1. Parsing the Json files and merging their values and
2. Retrieving nested keys using dot notation from the resulting array

Each of these sub problems were coded to an interface to abstract away details and focus on behaviour,
and to enable other possible implementations.

Each interface has one class that implements the solution to the problem.

`JsonFsConfigParser::parse` parses a set of json files into a `Config` instance. It skips the invalid json files as
requested.

`ArrayConfig::read` reads an entry from the parsed configuration. It supports dot notation.

Both classes are modestly unit tested, with close to a 90% coverage. The missing coverage corresponds mainly to code
paths for the `ArrayConfig` class `read` method that return early for simple cases.

Code has been formatted using PHP CS Fixer, following PSR standards.

## Usage

You can use the code as it follows:

```php
<?php

use Divido\JsonFsConfigParser;

$parser = new JsonFsConfigParser(
    __DIR__.'/path/to/a/file.json',
    __DIR__.'/path/to/another.json',
);

$config = $parser->parse();
$value = $config->read('some.nested.value');
```