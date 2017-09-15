<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Sentinel;

class CategoriesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:admin');
    // }

    public function index(Request $request)
    {
      $q = $request->get('q');
      $categories = Category::where('title', 'LIKE', '%'.$q.'%')->orderBy('title')->paginate(5);
      return view('categories.index', compact('categories', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'title' => 'required|string|max:255|unique:categories',
          // 'parent_id' => 'exists:categories,id'
      ]);
      Category::create($request->all());
      flash($request->get('title') . ' category saved.')->success()->important();
      return redirect()->route('categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|string|max:255|unique:categories,title,' . $category->id,
            'parent_id' => 'exists:categories,id'
        ]);
        $category->update($request->all());
        flash($request->get('title') . ' category updated.')->success()->important();
        return redirect()->route('categories.index');
    }

    public function destroy(Request $request, $id)
    {
        Category::find($id)->delete();
        flash($request->get('title') . ' category deleted.')->success()->important();
        return redirect()->route('categories.index');
    }
}
