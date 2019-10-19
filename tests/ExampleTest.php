<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use PHPUnit\Framework\TestCase;
use Kaythinks\Eazycurl\Eazycurl;

class ExampleTest extends TestCase
{
	public function testGetApiResponse()
	{
		$data = Eazycurl::getApiResponse('https://jsonplaceholder.typicode.com/todos/11');
		$this->assertIsArray($data);
	}

	public function testGetWebContents()
	{
		$data = Eazycurl::getWebContents('https://jsonplaceholder.typicode.com');
		$this->assertIsString($data);
	}

	public function testPostApiData()
	{
		$arrayData = [
	      title => 'foo',
	      body =>  'bar',
	      userId => 1
	    ];

		$data = Eazycurl::postApiData($arrayData,'https://jsonplaceholder.typicode.com/posts');
		$this->assertIsArray($data);
	}
}