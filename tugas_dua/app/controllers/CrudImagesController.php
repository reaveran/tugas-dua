<?php

class CrudImagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$crudimages = Crudimage::all();
    	return View::make('crudimages.index')
      	->with('crudimages', $crudimages);
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('crudimages.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validate = Validator::make(Input::all(), Crudimage::valid());
		if($validate->fails()) {
		   	return Redirect::to('crudimages/create')
		    ->withErrors($validate)
		    ->withInput();
		} else {
		    
		    $file = Input::file('file');
		    $input = array(
		        'upload' => $file
		    );

		    $rules = array(
		        'upload' => 'required|image|max:200'
		    );
		    $validation = Validator::make($input, $rules);
		    if ($validation->fails())
			{
			    return Redirect::to('crudimages/create')
			    ->withErrors($validation)
			    ->withInput();
			}else{
				$oldPath = $file->getRealPath();
				$newPath = public_path('images/'.$file->getClientOriginalName());
				$newPath2 = public_path('images2/'.$file->getClientOriginalName());
			    $img = Image::make($oldPath);
			    $img->resize(200, 100);
			    $img->save($newPath);
			    $img2 = Image::make($oldPath);
			    $img2->resize(600, 300);
			    $img2->save($newPath2);

			    $crudimg = new Crudimage;
			    $crudimg->title = Input::get('title');
			    $crudimg->directory = 'images/'.$file->getClientOriginalName();
			    $crudimg->directory2 ='images2/'.$file->getClientOriginalName();
	    		$crudimg->save();
	    		Session::flash('notice', 'Success add image');
		    	return Redirect::to('crudimages');
			} 
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$img = Crudimage::find($id);
		return View::make('crudimages.show')
	    ->with('img', $img);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$img = Crudimage::find($id);
	    return View::make('crudimages.edit')
	      ->with('crudimage', $img);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validate = Validator::make(Input::all(), Crudimage::valid());
	    if($validate->fails()) {
		     return Redirect::to('crudimages/'.$id.'/edit')
		     ->withErrors($validate)
		     ->withInput();
	    } else {
	        $file = Input::file('directory');
	        $crudimg = Crudimage::find($id);
		    $input = array(
		        'upload' => $file
		    );

		    $rules = array(
		        'upload' => 'required|image|max:200'
		    );
		    $validation = Validator::make($input, $rules);
		    if ($validation->fails())
			{
			    
			}else{
				$oldPath = $file->getRealPath();
				$newPath = public_path('images/'.$file->getClientOriginalName());
				$newPath2 = public_path('images2/'.$file->getClientOriginalName());
			    $img = Image::make($oldPath);
			    $img->resize(200, 100);
			    $img->save($newPath);
			    $img2 = Image::make($oldPath);
			    $img2->resize(600, 300);
			    $img2->save($newPath2);
			    $crudimg->directory = 'images/'.$file->getClientOriginalName();
			    $crudimg->directory2 ='images2/'.$file->getClientOriginalName();
			} 
			$crudimg->title = Input::get('title');
			$crudimg->save();
    		Session::flash('notice', 'Success update image');
	    	return Redirect::to('crudimages');
	    }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$img = Crudimage::find($id);
		File::delete(public_path().'/'.$img->directory);
		File::delete(public_path().'/'.$img->directory2);
	    $img->delete();
	    Session::flash('notice', 'Image success delete');
	    return Redirect::to('crudimages');
	}


}
