<?php

class Gif_Sources implements Iterator, Countable{

	private $collection = array();

	private $position = 0;

	public function __construct()
	{
		$this->position = 0;
	}

	public function rewind()
	{
	    $this->position = 0;
	}

	public function current()
	{
	    return $this->collection[$this->position];
	}

	public function key()
	{
	    return $this->position;
	}

	public function next()
	{
	    ++$this->position;
	}

	public function valid()
	{
	    //return isset($this->collection[$this->position]);
	}

	public function add(Gif_Source $source)
	{
		$this->collection[] = $source;
	}

	public function add_collection(array $sources)
	{
		/*foreach($sources as $source)
		{
			$this->collection[] = $source;
		}*/
	}

	public function remove($file_location)
	{

	}

	public function remove_all()
	{

	}

	public function get_all()
	{
		return $this->collection;
	}

	public function count()
	{
		return count($this->collection);
	}
}