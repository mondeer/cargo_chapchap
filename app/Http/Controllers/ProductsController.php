<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;
use Sentinel;

class ProductsController extends Controller
{
    protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }

    public function index(Request $request)
    {
        $q = $request->get('q');
        $products = Product::where('name', 'LIKE', '%'.$q.'%')
        ->orWhere('model', 'LIKE', '%'.$q.'%')
        ->orderBy('name')->paginate(10);
        return view('products.index', compact('products', 'q'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'name' => 'required|unique:products',
          'model' => 'required',
          'photo' => 'mimes:jpeg,png|max:10240',
          'weight' => 'required|numeric|min:1',
          'price' => 'required|numeric|min:1000'
      ]);
      $data = $request->only('name', 'model', 'price', 'weight');

      if ($request->hasFile('photo')) {
          $data['photo'] = $this->savePhoto($request->file('photo'));
      }

      $product = Product::create($data);
      $product->categories()->sync($request->get('category_lists'));

      flash($product->name . ' saved.')->success()->important();
      return redirect()->route('products.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|unique:products,name,'. $product->id,
            'model' => 'required',
            'photo' => 'mimes:jpeg,png|max:10240',
            'weight' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1000'
        ]);
        $data = $request->only('name', 'model', 'price');

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->savePhoto($request->file('photo'));
            if ($product->photo !== '') $this->deletePhoto($product->photo);
        }

        $product->update($data);
        if (count($request->get('category_lists')) > 0) {
            $product->categories()->sync($request->get('category_lists'));
        } else {
            // no category set, detach all
            $product->categories()->detach();
        }

        flash($product->name . ' updated.')->success()->important();
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->photo !== '') $this->deletePhoto($product->photo);
        $product->delete();
        flash($product->name . ' deleted.')->success()->important();
        return redirect()->route('products.index');
    }

    public function deletePhoto($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'img'
            . DIRECTORY_SEPARATOR . $filename;
        return File::delete($path);
    }
}
