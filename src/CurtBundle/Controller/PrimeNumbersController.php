<?php
namespace CurtBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use CurtBundle\Utility\Math\PrimeNumbers;

/**
 * We can set up the api behind "/api/[version]". This allows for better versioning
 * of apis and preventing bc issues
 * @Route("/api/1")
 */
class PrimeNumbersController extends Controller
{
	/**
	 * @Route("/primenumbers", name = "get_prime_numbers")
	 */
    public function getAction()
    {
        $response = new JsonResponse();
        $response->setData(['primes' => PrimeNumbers::listPrimes()]);

        return $response;
    }
}
