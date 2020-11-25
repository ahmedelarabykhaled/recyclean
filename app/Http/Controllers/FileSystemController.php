<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileSystemController extends Controller
{
    public function savefile(Request $request)
    {
        $imageName = rand(0000000, 999999999999) . '.' . $request->file->getClientOriginalExtension();
        $f = $request->file('file')->storeAs('my_image', $imageName);
        return redirect('/')->with('error', $f);
    }
}
