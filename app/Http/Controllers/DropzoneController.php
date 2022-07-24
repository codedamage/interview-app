<?php
namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    /**
     * Generate Image upload View
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('dropzone');
    }

    /**
     * Image Upload Code
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $image = $request->file('file');

        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        return response()->json(['success'=>$imageName]);
    }
}
