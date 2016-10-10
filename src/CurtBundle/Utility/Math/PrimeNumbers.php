<?php
namespace CurtBundle\Utility\Math;

/**
 * General utility class to work with prime numbers
 *
 * Having this functionality separated out allows us to reuse this. For example
 * you could have a setup script to auto populate a Redis database with the primes.
 */
class PrimeNumbers
{
    /**
     * Return a list of $listCount numbers that are prime
     *
     * Having a parameter $listCount allows for easy changing of
     * how many to output
     *
     * @param  integer $listCount The number of primes to list
     * @return array             Array of prime numbers
     */
    public static function listPrimes($listCount = 1000)
    {
        $i = 3;
        $primes = [ 2 ];

        while (count($primes) < $listCount) {
            if (self::isPrime($i)) {
                $primes[] = $i;
            }
            $i += 2;
        }

        return $primes;
    }

    /**
     * Checks if a number is prime
     * @param  integer  $num The number to check for primality
     * @return boolean      Returns true if it is prime, false otherwise
     */
    public static function isPrime($num)
    {
        // One is not prime
        // See https://en.wikipedia.org/wiki/Prime_number#Primality_of_one
        if ($num === 1) {
            return false;
        }

        // 2 is the only even prime number
        if ($num === 2) {
            return true;
        }

        // So, anything divisible by 2 is not prime
        if ($num % 2 === 0) {
            return false;
        }

        // iterate from 3 to the the number asked for
        // to see if it's divisible by any.
        // If the modulus is 0 at any point, it is not prime
        for ($i = 3; $i <= ceil(sqrt($num)); $i += 2) {
            if ($num % $i === 0) {
                return false;
            }
        }

        return true;
    }
}
