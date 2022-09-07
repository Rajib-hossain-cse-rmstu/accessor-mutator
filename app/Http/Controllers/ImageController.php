<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


class ImageController extends Controller
{
    public function download()
    {
        // dd('hi');
        // $filepath = public_path('uploads/')."customer_631742d9f00f83.19932615_329png";
        // $filepath = 'https://cdn.pixabay.com/photo/2022/08/28/08/49/beach-7416035_960_720.jpg';
        //  Response::download($filepath);

            $filename = 'temp-image.jpg';
            $tempImage = tempnam(sys_get_temp_dir(), $filename);
            copy('https://cdn.pixabay.com/photo/2022/08/28/08/49/beach-7416035_960_720.jpg', $tempImage);

            return response()->download($tempImage, $filename);

         Storage::disk('public')->put('laravel.png', file_get_contents('https://cdn.pixabay.com/photo/2022/08/28/08/49/beach-7416035_960_720.jpg'));
        // Storage::disk('images')->download('2568346.jpg');
         return redirect()->back();
    }
}
