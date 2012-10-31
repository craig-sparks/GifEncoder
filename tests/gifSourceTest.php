<?php

require('gif_source.php');

class GifSourceTest extends PHPUnit_Framework_TestCase {

	public function test_if_file_location_is_returned()
	{
		$source = new Gif_Source('tests/sources/frames/jpg/1.jpg');
		
		$this->assertSame('tests/sources/frames/jpg/1.jpg',$source->get_file_location());
	}

	public function test_if_jpg_file_type_is_returned()
	{
		$source = new Gif_Source('tests/sources/frames/jpg/1.jpg');
		
		$this->assertSame('image/jpeg',$source->get_file_type());
	}

	public function test_if_gif_file_type_is_returned()
	{
		$source = new Gif_Source('tests/sources/frames/gif/1.gif');
		
		$this->assertSame('image/gif',$source->get_file_type());
	}

	public function test_image_size()
	{
		$source = new Gif_Source('tests/sources/frames/jpg/1.jpg');

		$this->assertEquals('1299',$source->get_file_size());
	}

	public function test_image_width_dimensions()
	{
		$source = new Gif_Source('tests/sources/frames/gif/1.gif');

		$this->assertEquals('75',$source->get_width_dimension(),'Width does not match');
	}

	public function test_image_height_dimensions()
	{
		$source = new Gif_Source('tests/sources/frames/gif/1.gif');

		$this->assertEquals('50',$source->get_height_dimension(),'Height does not match');
	}
	
	/**
	 * @expectedException Gif_Encoder_Exception
	 */
	public function test_if_exception_is_thrown_if_file_does_not_exist()
	{
		new Gif_Source('filedoesnotexist.ext');
	}

	/**
	 * @expectedException Gif_Encoder_Exception
	 */
	public function test_if_exception_is_thrown_if_file_is_directory()
	{
		new Gif_Source('tests/sources/frames/png');
	}

	public function test_if_filesize_is_correctly_calculated()
	{

	}
}