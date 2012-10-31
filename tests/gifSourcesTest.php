<?php

require('gif_source.php');
require('gif_sources.php');

class GifSourcesTest extends PHPUnit_Framework_TestCase {

	public function test_add_single_source_to_collection()
	{
		$sources = new Gif_Sources();

		$source = new Gif_Source('tests/sources/frames/jpg/1.jpg');

		$sources->add($source);

		$collection = $sources->get_all();

		$this->assertEquals(1,count($collection));
	}

	public function test_current_interface_method()
	{
		$sources = new Gif_Sources();

		$source = new Gif_Source('tests/sources/frames/jpg/1.jpg');

		$sources->add($source);

		$this->assertSame($source,$sources->current());
	}

	public function test_next_interface_method()
	{
		$sources = new Gif_Sources();

		$source = new Gif_Source('tests/sources/frames/jpg/1.jpg');
		$source2 = new Gif_Source('tests/sources/frames/jpg/2.jpg');

		$sources->add($source);
		$sources->add($source2);

		$sources->next();

		$this->assertSame(1,$sources->key());
	}

	public function test_key_interface_method()
	{
		$sources = new Gif_Sources();

		$source = new Gif_Source('tests/sources/frames/jpg/1.jpg');
		$source2 = new Gif_Source('tests/sources/frames/jpg/2.jpg');

		$sources->add($source);
		$sources->add($source2);

		$this->assertSame(0,$sources->key());
	}

	public function test_rewind_interface_method()
	{
		$sources = new Gif_Sources();

		$source = new Gif_Source('tests/sources/frames/jpg/1.jpg');
		$source2 = new Gif_Source('tests/sources/frames/jpg/2.jpg');

		$sources->add($source);
		$sources->add($source2);

		$sources->next();
		$sources->rewind();

		$this->assertSame(0,$sources->key());
	}

	public function test_valid_interface_method()
	{
		$sources = new Gif_Sources();

		$source = new Gif_Source('tests/sources/frames/jpg/1.jpg');

		$sources->add($source);

		$this->markTestIncomplete('Need to figure best way to test this');
	}

	public function test_count_interface_method()
	{
		$sources = new Gif_Sources();

		$source = new Gif_Source('tests/sources/frames/jpg/1.jpg');
		$source2 = new Gif_Source('tests/sources/frames/jpg/2.jpg');

		$sources->add($source);
		$sources->add($source2);

		$this->assertSame(2,$sources->count());
	}
}