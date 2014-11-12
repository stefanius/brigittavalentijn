<?php

namespace Stef\HtmlManipulation\Manipulators;

use Stef\Manipulation\Manipulators\AbstractStringManipulator;

class RemoveHtmlAttributesManipulator extends AbstractStringManipulator
{
    protected function run($string)
    {
        $string = str_replace('&nbsp;', ' ', $string);
        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $string = html_entity_decode($string);
        $string = str_replace('&nbsp;', ' ', $string);
       // echo $string;
       // exit;
        $xmlReader = $this->createXmlReader($string);
        var_dump($xmlReader);
       // exit;
        $string = trim($string);
        $string = preg_replace("/[^a-zA-Z0-9_| -]/", ' ', $string);
        $string = preg_replace("/[| -]+/", '-', $string);
        $string = strtolower(trim($string, '-'));
        $string = preg_replace('/-{2,}/', ' ', $string);

        return $string;
    }

    protected function createXmlReader($string)
    {
        return simplexml_load_string('<root>' . trim($string) . '</root>');
    }
} 