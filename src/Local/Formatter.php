<?php
namespace App\Local;
class Formatter{
     function createSnippet($text, $maxLength = 150, $ellipsis = '...') {
        // Remove any HTML tags and trim the text
        $text = strip_tags(trim($text));
        // Check if the text length is less than or equal to the maxLength
        if (mb_strlen($text) <= $maxLength) {
            return $text;
        }
        // Find the last space before the maxLength
        $lastSpace = mb_strrpos(mb_substr($text, 0, $maxLength), ' ');
        // Create the snippet
        $snippet = mb_substr($text, 0, $lastSpace) . $ellipsis;
        return $snippet;
    }
}