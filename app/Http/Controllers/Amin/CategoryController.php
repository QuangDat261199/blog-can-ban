<?php

namespace App\Http\Controllers\Amin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.list', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required'
            ]
        );

        $slug = Str::slug($request->name);

        $checkSlug = Category::where('slug', $slug)->first();

        while($checkSlug) {
            $slug = $checkSlug->slug . Str::random(2);
        }

        Category::create([
            'name' => $request->name,
            'slug' => $slug
        ]);

        return redirect()->route('admin.category.index')->with('success', 'create successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required'
            ]
        );

        $slug = Str::slug($request->name);

        $checkSlug = Category::where('slug', $slug)->first();

        while($checkSlug) {
            $slug = $checkSlug->slug . "-" .Str::random(2);
        }

//        $category = Category::find($id);
//        $category->update([
//           'name' => $request->name,
//            'slug' => $slug
//        ]);

        Category::where('id', $id)->update([
            'name' => $request->name,
            'slug' => $slug
        ]);


        return redirect()->route('admin.category.edit', $id)->with('success', 'update successfully');
    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();

//        $category = Category::find($id);
//
//        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'deleted successfully');
    }
}
