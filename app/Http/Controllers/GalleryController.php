<?php

namespace App\Http\Controllers;

use App\Gallery;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class GalleryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

   public function viewGallerylist()
   {
   		$galleries = Gallery::where('created_by', Auth::user()->id)->get();

		return view('gallery.gallery')->with('galleries', $galleries);		
   }

   public function saveGallerylist(Request $request)
   {
   		//validation
   		$validator = Validator::make($request->all(), [
   			'gallery_name' => 'required|min:3',
   		]);

   		//take action when the validation has field
   		if ($validator->fails()) {
   			return redirect('gallery/list')
   			->withErrors($validator)
   			->withInput();
   		}

   		//
   		$gallery = new Gallery;
   		$userid = Auth::user()->id;
   		//save galley
   		$gallery->name = $request->input('gallery_name');
   		$gallery->created_by = Auth::user()->id;
   		$gallery->published = 1;
   		$gallery->save();

   		return redirect()->back();
   }

   public function viewGalleryPics($userid)
   {
   		$gallery = Gallery::findOrFail($userid);

		return view('gallery.gallery-view')->with('gallery', $gallery);
   }

   public function doImageUpload(Request $request)
   {
   	// Get the file from post request
   	$file = $request->file('file');
   	// Set new file name
   	$filename = uniqid() . $file->getClientOriginalName();
   	// Move file to correct location
   	$file->move('gallery/images', $filename);
   	// Save image details to db
   	$gallery = Gallery::find($request->input('gallery_id'));
   	$image = $gallery->images()->create([
   		'gallery_id' => $request->input('gallery_id'),
   		'file_name' => $filename,
   		'file_size' => $file->getClientSize(),
   		'file_mime' => $file->getClientMimeType(),
   		'file_path' => 'gallery/images/' . $filename,
   		'created_by' => Auth::user()->id,
   	]);

   	return $image;
   }

   public function deleteGallery($id)
   {
   		$currentGallery = Gallery::findOrFail($id);

   		if ($currentGallery->create_by != Auth::user()->id) {
   			abort('403', 'You are not allowed to delete this galley');
   		}

   		$images = $currentGallery->images();
   		foreach ($currentGallery->images() as $image) {
   			unlink(public_path($image->file_path));
   		}

   		$images->delete();

   		$currentGallery->delete();

   		return redirect()->back();
   }
}
