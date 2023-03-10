<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all();
        $books = Book::where('title', 'like', '%'.$request->title.'%')->get();
        return view('books/book', ['books' => $books]);
    }
    public function add()
    {
        $categories = Category::all();
        return view ('books/book-add',['categories'=>$categories]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255'
        ]);
        $newName = '';
        if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }
         $request['cover'] = $newName;
         $book = Book::create($request->all());
         $book->categories()->sync($request->categories);
         return redirect('books')->with('status', 'Berhasil Menammbahkan Buku Baru!');
    }
    public function edit($slug)  
    {
        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view ('books/book-edit',['categories'=> $categories, 'book' => $book]);
    }

    public function update(Request $request, $slug)
    {
        if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;

        }       
        $book = Book::where('slug', $slug)->first();
        $book->update($request->all());
        
        
        if($request->categories){
            $book->categories()->sync($request->categories);

        }
        return redirect('books')->with('status', 'Berhasil Meng-Edit Data Buku!');

    }
    public function delete($slug)
    {
        $book = Book::where('slug', $slug)->first();
        return view ('books/book-delete', ['book' => $book]);
    }
    public function destroy($slug)
    {   
        $book = Book::where('slug', $slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Berhasil Menghapus Buku!');
    }
    public function deletedBook()
    {
        $deletedBooks = Book::onlyTrashed()->get();
        return view('books/book-deleted-list',['deletedBooks' => $deletedBooks]);
    } 
    public function restore($slug)
    {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();
        return redirect('books')->with('status', 'Berhasil Me-Restore Buku!');
    }

}
