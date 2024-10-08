--TEST--
Test gzdeflate() function : basic functionality
--EXTENSIONS--
zlib
--FILE--
<?php
/*
 * add a comment here to say what the test is supposed to do
 */

include(__DIR__ . '/data.inc');

echo "*** Testing gzdeflate() : basic functionality ***\n";

// Initialise all required variables

$smallstring = "A small string to compress\n";


// Calling gzdeflate() with all possible arguments

// Compressing a big string
for($i = -1; $i < 10; $i++) {
    echo "-- Compression level $i --\n";
    $output = gzdeflate($data, $i);
    var_dump(strcmp(gzinflate($output), $data));
}

// Compressing a smaller string
for($i = -1; $i < 10; $i++) {
    echo "-- Compression level $i --\n";
    $output = gzdeflate($smallstring, $i);
    var_dump(strcmp(gzinflate($output), $smallstring));
}

// Calling gzdeflate() with just mandatory arguments
echo "\n-- Testing with no specified compression level --\n";
$output = gzdeflate($smallstring);
var_dump(strcmp(gzinflate($output), $smallstring));

?>
--EXPECT--
*** Testing gzdeflate() : basic functionality ***
-- Compression level -1 --
int(0)
-- Compression level 0 --
int(0)
-- Compression level 1 --
int(0)
-- Compression level 2 --
int(0)
-- Compression level 3 --
int(0)
-- Compression level 4 --
int(0)
-- Compression level 5 --
int(0)
-- Compression level 6 --
int(0)
-- Compression level 7 --
int(0)
-- Compression level 8 --
int(0)
-- Compression level 9 --
int(0)
-- Compression level -1 --
int(0)
-- Compression level 0 --
int(0)
-- Compression level 1 --
int(0)
-- Compression level 2 --
int(0)
-- Compression level 3 --
int(0)
-- Compression level 4 --
int(0)
-- Compression level 5 --
int(0)
-- Compression level 6 --
int(0)
-- Compression level 7 --
int(0)
-- Compression level 8 --
int(0)
-- Compression level 9 --
int(0)

-- Testing with no specified compression level --
int(0)
