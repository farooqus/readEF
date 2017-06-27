<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Unirest;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {        
		$rawResponse = $this->readResource(
			$this->container->getParameter('api_endpoint'), 
			$this->container->getParameter('api_username'), 
			$this->container->getParameter('api_password')
		);
		
		$response = json_decode(json_encode($rawResponse->body), true);
		
		usort($response['events'], function ($item1, $item2) {
			if ($item1['name'] == $item2['name'])
				return 0;
			return $item1['name'] < $item2['name'] ? -1 : 1;
		});
		
		return $this->render('default/data.html.twig', ['data' => $response,]);				
    }
	
	/**
     * read data from resource.     *
     * @param $resource string
	 * @param $user string
	 * @param $password string
     * @return $response
     */
    public function readResource($resource, $user, $password)
    {		
		Unirest\Request::auth($user, $password);   
		$response = Unirest\Request::get($resource);
		return $response;		
	}
}
