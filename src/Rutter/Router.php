<?php

namespace Rutter;

/**
* Router class
*
* @package default
* @author ilpaijin <ilpaijin@gmail.com>
*/
class Router 
{
	/**
	 * [$routes description]
	 * @var array
	 */
	public $routes = array();

	/**
	 * [$currentRoute description]
	 * @var string
	 */
	protected $currentRoute = '';

	/**
	 * [__construct description]
	 * @param Request $request [description]
	 */
	public function __construct(Request $request)
	{	
		$this->request = $request;
	}
	/**
	 * [rutta description]
	 * @return [type] [description]
	 */
	public function rutta()
	{
		if($this->matchRoute())
		{
			$target = $this->currentRoute->getTarget();

			if(is_callable($target))
			{
				return $target($this);
			}
			else 
			{
				return $target;
			}
			
		}

		throw new RutterException('Undefined route');
	}

	/**
	 * [getRequest description]
	 * @return [type] [description]
	 */
	public function getRequest()
	{
		return $this->request;
	}

	/**
	 * [addRoute description]
	 * @param [type] $method [description]
	 * @param [type] $url    [description]
	 * @param [type] $target [description]
	 */
	public function addRoute($method, $url, $target)
	{
		return new Route($method, $url, $target);
	}

	/**
	 * [get description]
	 * @param  [type] $url     [description]
	 * @param  [type] $target [description]
	 * @return [type]           [description]
	 */
	public function get($url, $target)
	{
		$this->routes[] = $this->addRoute('GET', $url, $target);
	}

	/**
	 * [post description]
	 * @param  [type] $url     [description]
	 * @param  [type] $target [description]
	 * @return [type]           [description]
	 */
	public function post($url, $target)
	{
		$this->routes[] = $this->addRoute('POST', $url, $target);
	}	

	/**
	 * [matchRoute description]
	 * @return [type] [description]
	 */
	protected function matchRoute()
	{
		foreach($this->getMatchingRoutes() as $route)
		{
			if($route->getMethod() == $this->request->getMethod())
			{
				return $this->currentRoute = $route;
			}
		}

		return false;
	}

	/**
	 * [getMatchingRoutes description]
	 * @return [type] [description]
	 */
	public function getMatchingRoutes()
	{
		$matchingRoutes = array();

		foreach($this->routes as $route)
		{
			if($route->getUrl() == $this->request->getUrl())
			{
				$matchingRoutes[$route->getMethod()] = $route;
			}
		}

		return $matchingRoutes;
	}
}