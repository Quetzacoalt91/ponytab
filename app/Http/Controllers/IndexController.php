<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function show (Request $request)
    {
        $data = array();
        $courrentHour = date('H');
        if ($courrentHour < 10 || $courrentHour >= 22) {
            $data['nightMode'] = 'night';
        } else {
            $data['nightMode'] = '';
        }
        try {
            $data['pictures'] = array_map(function($file) {
                    return url('/content/'.base64_encode($file));
                }, Storage::disk('photos')->allFiles(''));
        } catch (Exception $e) {
            $data['pictures'] = array_map(function($file) {
                    return url('/content/'.base64_encode($file));
                }, Storage::disk('photos_cache')->allFiles(''));
        }
        shuffle($data['pictures']);
        return view('slideshow.main', $data);
    }
    
    public function content(Request $request, $file)
    {
        $filename = base64_decode($file);
        
        if (!Storage::disk('photos_cache')->has($filename)) {
            Storage::disk('photos_cache')->put($filename, 
                Storage::disk('photos')->get($filename));
        }
        
        return $this->sendContent('photos_cache', $filename);
    }
    
    private function sendContent($driver, $filename)
    {
        $headers = array(
            'Content-Type'     => Storage::disk($driver)->mimeType($filename),
            'Content-Disposition' => 'inline; filename="'.$filename.'"');
        return (new Response(
            Storage::disk($driver)->get($filename), 
            200, 
            $headers
        ));
    }
}
