<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;

class ContentController extends Controller
{

    public function dashboard() {
        // Assuming the user is already logged in and the session has been started
        session_start();

        $books = Book::all();
        
        // Retrieve the user's name from the session or database
        $name = $_SESSION['name'] ?? 'Guest'; // Default to 'Guest' if no name is found

        // Pass the name to the view
        return view('dashboard', ['name' => $name] , compact('books'));
    }

    public function addbook(){
        return view('addbook');
    }

    public function store_book(Request $request) {
        $request->validate([
            'genre' => 'required',
            'bookname' => 'required',
            'author' => 'required',
        ]);

        try{
            $data  = [
                'genre' => $request->genre,
                'bookname' => $request->bookname,
                'author' => $request->author,
                'loaned' => $request->loaned,
            ];

            Book::create($data);
            return redirect()->route('dashboard')->with('success', 'Your Book Has Succesfully Added');
        }catch(\Exception $e) {
            return redirect()->route('addbook')->with('error', 'Error Adding Books: ' . $e->getMessage());
        }
    }

    public function delete_book($id){
        $book = Book::find($id);
        $book->delete();
        return redirect('dashboard')->with('success', 'Book has been deleted');
    }

    public function edit_book(Request $request, $id){
        $book = Book::find($id);
        if ($book) {
            $book->update($request->all());
            return redirect()->route('dashboard')->with('success', 'Book has been updated');
        } else {
            return redirect()->route('dashboard')->with('error', 'Book not found');
        }
    }
}
