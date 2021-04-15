<?php

// Simple Comparisons
// Simple String Comparison
$var = 'awesome';
if ($var == 'awesome') { //-> 'awesome' = 'awesome'
    return true;
}

// Simple String Replacement
$var = str_replace("blue", "red", "Roses are blue"); //-> Roses are red

// Simple String Matching
$pos = strpos("Dave likes chocolate", "choc");
if ($pos === false) {
    $found_choc = false; //-> $found_choc is !false because 'choc' was found
}
// ===

// Regular Expressions (phpliveregex.com - mess around with regular expressions)
// Advanced matching using preg_match
$var = 'Dave';
if (preg_match("/Dave/", $name)) {
    return true; //-> 'Dave' contains the characters: 'Dave' in that order
}

// NOTE: EXPRESSIONS ARE CASE SENSITIVE
// to search case insensitive add 'i' to the parameters. ie /abc/i vs /abc/
// Wildcard Characters

//      - \d matches any digit 0-9
$var = 'abc123';
if (preg_match("/abc\d/", $var)) {
    return true; //-> 'abc123' contains 'abc' and any number after 'c'
} else if (preg_match("/ab\d/", $var)) {
    return false; //-> 'abc123' does not contain 'ab' followed by a number
} else if (preg_match("/\d\d/", $var)) {
    return true; //-> 'abc123' contains two numbers side by side
}

//      - \w matches any character a-z, A-Z, or 0-9
$var = 'AbC123';
if (preg_match("/\wbC1/", $var)) {
    return true; //-> 'AbC123' contains any character followed by 'bC1'
} else if (preg_match("/Ab\w\w\w/", $var)) {
    return true; //-> 'AbC123' contains 'Ab' followed by any 3 characters a-z, A-Z, or 0-9
}

//      - \s matches any whitespace character (space/tab/etc)
$var = 'ab c1 23';
if (preg_match("/ab\sc/", $var)) {
    return true; //-> 'ab c1 23' contains 'ab c'
}


// All together now
$var = 'abc 123';
if (preg_match("/\w\s\d/", $var)) {
    return true; //-> 'abc 123' containts a letter, whitespace, and number in that order.
}

// Special Characters
//      - ^ is the start of a string
//      - $ is the end of a string
$var = 'abc123';
if (preg_match("/^abc/", $var)) {
    return true; //-> 'abc123' has 'abc' at the START of the string
} else if (preg_match("/123$/", $var)) {
    return true; //-> 'abc123' has '123' at the END of the string
} else if (preg_match("/^123abc/", $var)) {
    return false; //-> 'abc123' contains the characters, but '123' is not at the START of the string
} else if (preg_match("/^abc123$/", $var)) {
    return true; //-> 'abc123' starts with 'abc' and ends with '123'
}

//      - * zero or more
//      - + one or more
$var = 'aaabc';
if (preg_match("/a*bc/", $var)) {
    return true; //-> 'aaabc' contains zero or more 'a' followed by 'bc'
} else if (preg_match("/d*abc/", $var)) {
    return true; //-> 'aaabc' contians ZERO or more 'd' followed by 'abc'
} else if (preg_match("/f+abc/", $var)) {
    return false; //-> 'aaabc' does not contain at least one 'f' followed by 'abd'
}

//      - . matches ANY single character (letter, number, whitespace, NULL, etc)
$var = 'abcd3';
if (preg_match("/ab..3/", $var)) {
    return true; //-> 'abcd3' contains 'ab' followed by ANY two characters and '3'
} else if (preg_match("/...../", $var)) {
    return true; //-> 'abcd3' contians any 5 characters in any order
} else if (preG_match("/abc.*/", $var)) {
    return true; //-> 'abcd3' contains 'abc' followed by any number of any character
} else if (preg_match("/ab.c/", $var)) {
    return false; //-> 'abcd3' does not contain 'ab' followed by any character and 'c'
}
// NOTE: IN ORDER TO SEARCH FOR A SPECIAL CHARACTER YOU MUST ESCAPE THE CHARACTER
// ex. /abc\./ to search for '.'

// Character Sets and Ranges
//      - [123] matches 1, 2, or 3
//      - [1-3] matches range 1-3
$var = 'a2b';
if (preg_match("/a[123]b/", $var)) {
    return true; //-> 'a2b' contains 'a' followed by 1,2,or 3 and 'b'
} else if (preg_match("/a[1-5]b/", $var)) {
    return true; //-> 'a2b' contians 'a' followed by a number 1-5 and 'b'
} else if (preg_match("/a[3-6]b/", $var)) {
    return false; //-> 'a2b' does not contain 'a' followed by a number [3-6] and 'b'
} else if (preg_match("/[a-z0-9 ]+/", $var)) {
    return true; //-> 'a2b' contians at least one character a-z, 0-9, or ' '
}
//      - [^] matches given characters EXCEPT the ones specified
//  ex. [^123] matches any characters EXCEPT 1,2, or 3
// ===

// Saving Match Results
// Adding a third param saves the matches in an array
// Adding () around a portion of the search string will save that portion as an item in the array
// ?<name> will replace the array index for the stored item with the name instead
$var = 'September 1988';
if (preg_match("/September/", $var, $match)) {
    return $match; //-> $match = [0 => 'September']
} else if (preg_match("/Se(ptemb)er/", $var)) {
    return $match; //-> $match = [0 => 'September', 1 => 'ptemb']
} else if (preg_match("/([a-zA-Z]+) (\d+)/", $var)) {
    return $match; //-> $match = [..., 1 => 'September', 2 => '1988']
} else if (preg_match("/(?<month>[a-zA-Z]+)(?<year>\d+)/", $var)) {
    return $match; //-> $match = [..., 'month' => 'September', 'year' => '1988']
}
// ===

// Regular Expression Replacing
// preg_replace($reg_exp, $replacement, $string)
if (preg_replace("/Bob/", 'Dan', 'Hi my name is Bob')) {
    return; //-> 'Hi my name is Dan'
} else if (preg_replace("/\s+/", ',', 'a b c d')) {
    return; //-> 'a,b,c,d'
}

// Replacing and recalling capture groups
if (preg_replace("/(\w+) and (\w+)/", '\1 or \2', 'Jack and Jill')) {
    return; //-> 'Jack or Jill'
}
