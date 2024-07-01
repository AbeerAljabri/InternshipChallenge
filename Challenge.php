<?php


/* 
-------------Task 1----------------

Interfaces cannot have properties or method implementations, whereas abstract classes can.
All interface methods must be public, whereas abstract class methods may be public or protected.
The abstract class is used when there is a base class with some implemented functionality and some undefined functionality that subclasses must implement.
Here's an example of using abstract classes: Assume you're creating a system for managing various types of aircraft.
Airplanes share similarities and behaviors, but also have unique characteristics that set them apart.

 */


  
//------------- Task 2 ----------------

// Function to calculate the factorial of a number
// Parameters:
// $number: The number for which factorial is to be calculated
// Returns:
// Factorial of the given number if it's a non-negative integer, or an error message if it's negative

function factorial($number) {
    // Check if the number is negative
    if ( $number < 0)
    {
    return "You should enter a positive number\n";
    }
    // Base case: factorial of 0 is 1
    if ( $number == 0 )
    {
        return 1;
    } 
    // Recursive case: calculate factorial
    return  $number * factorial($number - 1 );

}


#------------- Task 3 ----------------

// Function to find the minimum and maximum values in an array of numbers
// Parameters:
// $numbers: An array of numbers
// Prints:
// Outputs the maximum and minimum values found in the array, or a message if the array is empty

function minMax($numbers) {
    $length = count($numbers);
    $i = 1;

    // Check if the array is not empty
    if ( $length > 0 ) {
        $max = $numbers[0]; // Initialize max with the first element
        $min = $numbers[0]; // Initialize min with the first element

        // Loop through the array to find max and min
        while ($i < $length) {
            // Update max if current element is greater
            if ($numbers[$i] > $max ) {
                $max = $numbers[$i];
            }
            // Update min if current element is smaller
            if ($numbers[$i] < $min ) {
                $min = $numbers[$i];
            }   
            $i++; // Move to the next element
        }
        // Output the results
        echo "max: $max\n";
        echo "min: $min\n";
    }
    else {
        // Handle case where the array is empty
        echo "The list is empty\n";
    }
}

/* The overall time complexity of the minMax function is 𝑂(𝑛), where 𝑛 is the number of elements in the input array numbers. 
 This is a linear time complexity so that the function's runtime increases linearly with the size of the input array.*/




#------------- Task 4 ----------------

// Function to convert a decimal number to a 32-bit binary representation
// Parameters:
// $num: The decimal number to be converted to binary
// Prints:
// Outputs the binary representation of the given decimal number

function decimalToBinary($num) {

    $bin = []; // Array to store binary digits
    $i = 31; // Start from the most significant bit (assuming 32-bit integer)

    // Convert decimal to binary
    while ( $i >= 0) {
        // Store the least significant bit (LSB) of num in bin
        $bin[$i] = $num & 1;

        // Move to the next bit (right shift num by 1)
        $num >>= 1;

        // Decrement index
        $i--;


    }

    // Output the converted binary representation
    echo "Converted binary: ";
    for ($i = 0; $i < 32; $i++) {
        echo $bin[$i]; // Print each binary digit
    }
    echo "\n";
}


/*
Bitwise AND (&)
The operation $num & 1 is used to extract the least significant bit (LSB) of the number num. 
The bitwise AND operation compares each bit of num with the corresponding bit of 1 (which is 00000001 in binary). Since only the LSB of 1 is 1 and all other bits are 0, this operation effectively isolates the LSB of num. For example:
If num is 5 (which is 0101 in binary), num & 1 will be 1 because the LSB of 5 is 1.
If num is 6 (which is 0110 in binary), num & 1 will be 0 because the LSB of 6 is 0.

Right Shift (>>)
The operation $num >>= 1 is used to shift all bits of num one position to the right. The rightmost bit is discarded, and a 0 is added on the left. This effectively divides the number by 2 (ignoring the remainder). For example:
If num is 5 (0101 in binary), after num >>= 1, num becomes 2 (0010 in binary).
If num is 6 (0110 in binary), after num >>= 1, num becomes 3 (0011 in binary).
*/



#------------- Task 6 ----------------

// Function to check if a number is prime
// Parameters:
// $n: The number to check for primality
// Returns:
// true if $n is prime, false otherwise

function isPrime($n) { 
    // Corner case: numbers less than or equal to 1 are not prime
    if ($n <= 1) 
        return false; 
  
    // Check from 2 to n-1 for factors
    for ($i = 2; $i < $n; $i++) 
        if ($n % $i == 0) 
            return false;  // Found a factor other than 1 and itself
  
    return true;  // No factors other than 1 and itself, so it's prime
} 

// Function to find all prime numbers in a specified range
// Parameters:
// $start: The starting number of the range
// $end: The ending number of the range
// Prints:
// Outputs the prime numbers found in the specified range

function findPrimes($start, $end){
    $primes = []; // Array to store prime numbers

    // Validate input: both start and end should be positive integers
    if ( $start < 0 || $end < 0) {
        echo  "You should enter a positive numbers\n";
        return;
    }

    // Validate input: start should be less than or equal to end
    if ( $start > $end ) {
        echo  "The first number should be less than the last number\n";
        return;
    }

    // Iterate through each number in the range and check if it's prime
    for ( $i = $start; $i <= $end ; $i++){
        if ( isPrime($i) == true)
        {
            $primes[] = $i; // Add prime number to the primes array
        }
    }

    // Output the results
    echo "The primes in the range ( $start , $end ) are: \n";
    echo implode(", ", $primes) . "\n";
}


#------------- Task 7 ----------------

// Function to check if a string is a palindrome
// Parameters:
// $str: The string to check
// Returns:
// true if $str is a palindrome (ignoring case and non-alphanumeric characters), false otherwise
  
function isPalindrome($str) { 

    // Remove non-alphanumeric characters and convert to lowercase
    $str = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $str));

    // Compare the string with its reverse to check for palindrome
    if (strrev($str) === $str){  
        return true;  // It's a palindrome
    }
    else {
        return false; // It's not a palindrome
    }
}

// Other implementation of the previous function

// Function to check if a string is a palindrome
// Parameters:
// $str: The string to check
// Returns:
// true if $str is a palindrome (ignoring case and non-alphanumeric characters), false otherwise

function isPalindrome2($str) { 

    // Remove non-alphanumeric characters and convert to lowercase
    $str = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $str));
    $length = strlen($str);
    $j = $length-1;

    // Check characters from both ends towards the center
    for ($i = 0; $i < $length/2; $i++) 
    {
        if ($str[$i] !== $str[$j]) // Not a palindrome
        {
            return false; 
        }
        $j--;
    }
    return true; // It's a palindrome
}
    

#------------- Usage ----------------
echo "----- Taks 2 -----\n";
echo factorial(4)  . "\n";

echo "----- Taks 3 -----\n";
minMax([3,3,20,1,-5]) ;

echo "----- Taks 4 -----\n";
decimalToBinary(3);

echo "----- Taks 6 -----\n";
findPrimes(1,20) ;

echo "----- Taks 7 -----\n";
if(isPalindrome('Avav, A')){  
    echo "Palindrome\n";  
} 
else {  
    echo "Not a Palindrome\n";  
}

if(isPalindrome2('Avav, A')){  
    echo "Palindrome\n";  
} 
else {  
    echo "Not a Palindrome\n";  
}


/* Output sample

----- Taks 2 -----
24
----- Taks 3 -----
max: 20
min: -5
----- Taks 4 -----
Converted binary: 00000000000000000000000000000011
----- Taks 6 -----
The primes in the range ( 1 , 20 ) are:
2, 3, 5, 7, 11, 13, 17, 19
----- Taks 7 -----
Palindrome
Palindrome

*/
?>
