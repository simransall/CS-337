<?php
<?php

//
// Rick Mercer and Simran Sall
//
// File MovieReport.php
//
// Read in a folder containing 8-20 .txt files holding movie data
// and generate a report on that movie.
//

print ("Enter movie directory tmnt, tmnt2, mortalkombat, or princessbride: ");
//$folder = readline ();

// If you have PHP 5, install XAMPP for Windows version 7 or use this line
$folder = stream_get_line(STDIN,20 ,PHP_EOL);

// Need $movieDir in a a couple of functions below
$movieDir = $folder . '/';


printTitle ();  // Print the first three lines
printOverview (); // Print all elements in overview.txt
printReviews ();  // Print all reviews from the files review1.txt, review2.txt, review3.txt,  . . .


function printTitle() {
    global $movieDir; // global provides access to the global variable $movieDir defined above
    list($name, $year, $rating) = file($movieDir . 'info.txt');
    echo 'Title: ' . $name;
    echo 'Year: ' . $year;
    echo 'Rating: ' . $rating;
    print("\n\n");
}

function printOverview() {
    global $movieDir;
    $array = file($movieDir . 'overview.txt');
    $new_array = array();
    for($i = 0; $i < count($array); $i++)  {
        array_push($new_array, $array[$i]);
        list($label, $info) = explode(":", $new_array[$i]);
        print($label . ":\n" . $info . "\n");
    }
    print("\n");
    
}

function printReviews(){
    global $movieDir;
    $array = glob($movieDir . '*.txt');
    // print_r($array);
    for($i = 0; $i < count($array); $i++)  {
        $str = file_get_contents($array[$i]);
        print($str . "\n\n");
    }
    
}
?>