<?php namespace Illuminate\Support\Facades;

/**
 * @see \Illuminate\Filesystem\Filesystem
 */
class File extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'files'; }

	public static function fileExtImage($doc)
	{
		$ext = pathinfo($doc, PATHINFO_EXTENSION);
		$extImg = array("pdf", "txt", "rar", "doc", "zip", "xml", "png", "jpg", "gif");
		if (in_array($ext, $extImg))
		{
			return $ext;
		}
	}

}
