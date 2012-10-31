<?php

include('gif_encoder_exception.php');

class Gif_Source {

	protected $location = NULL;

	protected $type = NULL;

	protected $size = NULL;

	protected $width_dimension = 0;

	protected $height_dimension = 0;

	public function __construct($file_location)
	{
		if(!file_exists($file_location) || is_dir($file_location))
		{
			throw new Gif_Encoder_Exception('Image file `'.$file_location.'` does not exist.');
		}

		$this->location = $file_location;
		$this->determine_type();
		$this->determine_filesize();
		$this->determine_dimensions();
	}

	public function get_file_location()
	{
		return $this->location;
	}

	public function get_file_type()
	{
		return $this->type;
	}

	public function get_file_size()
	{
		return $this->size;
	}

	public function get_dimensions()
	{
		return(array($this->width_dimension,$this->height_dimension));
	}

	public function get_height_dimension()
	{
		return $this->height_dimension;
	}

	public function get_width_dimension()
	{
		return $this->width_dimension;
	}

	public function determine_filesize()
	{
		$this->size = filesize($this->location);
	}

	public function determine_type()
	{
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		$this->type = $finfo->file($this->get_file_location());
	}

	public function determine_dimensions()
	{
		$dimensions = getimagesize($this->location);

		$this->width_dimension = $dimensions[0];
		$this->height_dimension = $dimensions[1];
	}
}