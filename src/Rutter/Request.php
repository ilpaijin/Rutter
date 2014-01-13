<?php

namespace Rutter;

/**
* Request class
*
* @package default
* @author ilpaijin <ilpaijin@gmail.com>
*/
class Request 
{
	/**
	 * [$request description]
	 * @var [type]
	 */
	protected $request;

	/**
	 * [$method description]
	 * @var [type]
	 */
	protected $method;

	/**
	 * [$requestUrl description]
	 * @var [type]
	 */
	protected $requestUrl;

	/**
	 * [$front description]
	 * @var string
	 */
	private $front = 'client.php';

	/**
	 * [__construct description]
	 * @param [type] $request [description]
	 */
	public function __construct($request)
	{
		$this->parseRequest($request);
	}

	/**
	 * [parseNewRoute description]
	 * @param  [type] $request [description]
	 * @return [type]           [description]
	 */
	public function parseRequest($request)
	{
		$this->method = $request['REQUEST_METHOD'];

		$url = explode('/', rtrim($request['REQUEST_URI'], '/'));
		$url = end($url);

		$this->requestUrl = (empty($request['REQUEST_URI']) || $url == $this->front) ? '/' : '/'.$url;
	}

	/**
	 * [getUrl description]
	 * @return [type] [description]
	 */
	public function getUrl()
	{
		return $this->requestUrl;
	}

	/**
	 * [getMethod description]
	 * @return [type] [description]
	 */
	public function getMethod()
	{
		return $this->method;
	}
}