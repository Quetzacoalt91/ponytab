<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function show (Request $request)
    {
        $data = array(
            'pictures' => array_map(function($file) {
                return url('/content/'.base64_encode($file));
            }, Storage::disk('photos')->allFiles('')),
        );
        return view('slideshow.main', $data);
    }
    
    public function content(Request $request, $file)
    {
        $filename = base64_decode($file);
        $headers = array(
            'Content-Type'     => Storage::disk('photos')->mimeType($filename),
            'Content-Disposition' => 'inline; filename="'.$filename.'"');
        return (new Response(
            Storage::disk('photos')->get($filename), 
            200, 
            $headers
        ));
    }
}
