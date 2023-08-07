<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;

class ColorController extends Controller
{
    public function index () {
        $color = Color::all();
        return view('admin.colors.index',compact('color'));
    }

    public function create () {
        return view('admin.colors.create');
    }

    public function store (ColorFormRequest $request) 
    {
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1':'0';
        Color ::create($validatedData);
        return redirect('admin/colors')->with('message','Color added successfully');
    }

    public function edit (Color $color) {
        
        return view('admin.colors.edit', compact('color'));
    }

    public function update (ColorFormRequest $request, $color_id) 
    {
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1':'0';
        Color::find($color_id)->update($validatedData);

        return redirect('admin/colors')->with('message','Color updated successfully');
    }

    public function delete ($color_id) {
        $color = Color::find($color_id);
        $color->delete();
        return redirect('admin/colors')->with('message','Color deleted successfully');
    }
}
