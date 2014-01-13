<?php

namespace Rutter;

/**
* Route class
*
* @package default
* @author ilpaijin <ilpaijin@gmail.com>
*/
class Route 
{
	/**
	 * [$method description]
	 * @var [type]
	 */
	protected $method;

	/**
	 * [$path description]
	 * @var [type]
	 */
	protected $url;

	/**
	 * [$target description]
	 * @var [type]
	 */
	protected $target;

	/**
	 * [__construct description]
	 * @param [type] $route [description]
	 */
	public function __construct($method, $url, $target)
	{
		$this->method = $method;
		$this->url = $url;
		$this->target = $target;
	}

	/**
	 * [getUrl description]
	 * @return [type] [description]
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * [getMethod description]
	 * @return [type] [description]
	 */
	public function getMethod()
	{
		return $this->method;
	}

	/**
	 * [getTarget description]
	 * @return [type] [description]
	 */
	public function getTarget()
	{
		return $this->target;
	}
}