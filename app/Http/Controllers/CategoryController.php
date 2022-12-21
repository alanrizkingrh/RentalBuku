<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        //tes
        $categories = Category::paginate(5);
        //sampai sini
        return view('category', ['categories' =>$categories]);
    }
    public function add()
    {
        return view('category-add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);
         $category = Category::create($request->all());
         return redirect('categories')->with('status', 'Berhasil Menammbahkan Kategori Baru!');
    }
    public function edit($slug)  
    {
        $category = Category::where('slug', $slug)->first();
        return view ('category-edit',['category'=> $category]);
    }
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug=null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Berhasil Mengubah Kategori Buku!');

    }

    public function delete($slug)    
    {
        $category = Category::where('slug', $slug)->first();
        return view ('category-delete',['category' =>$category]);
    }
    public function destroy($slug)
    {   
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Berhasil Menghapus Kategori Buku!');
    }
    public function deletedCategory()
    {
        $deletedCategories = Category::onlyTrashed()->get();
        // dd($deletedCategories);
        return view('category-deleted-list',['deletedCategories' => $deletedCategories]);
    } 
    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Berhasil Me-Restore Kategori Buku!');
    }
}
