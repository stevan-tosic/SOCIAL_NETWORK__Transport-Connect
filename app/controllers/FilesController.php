<?php
class FilesController extends BaseController 
{
	public function fileUpload()
	{
		return View::make('timeline.file-upload');
	}

	public function submitFileUpload()
	{
		var_dump(Input::file('file'));
	}
}