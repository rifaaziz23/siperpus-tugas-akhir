<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookshelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['books'] = Book::all();       // ambil data
        return view('books.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // menampilkan form inputannya
    {
        $data['bookshelves'] = Bookshelf::pluck('name', 'id');  // hanya ambil 2 kolom
        return view('books.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data inputan dari form
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|integer|digits:4|min:1900|max:'.(date('Y')),  # 2004, 1998
            'publisher' => 'required|max:255',
            'city'=> 'required|max:255',
            'bookshelf_id' => 'required',
            'cover' => 'required|image'
        ]);

        # proses upload file cover buku, jika inputan ada covernya
        if($request->hasFile('cover')){
            # buat path untuk menyimpan file cover buku
            $path = $request->file('cover')->storeAs(
                'cover_buku',   # nama folder
                'cover_buku_'.time(). '.' . $request->file('cover')->extension(),  # nama file
                'public'    # disk penyimpanan
            );

            # simpan path ke cover
            $validated['cover'] = basename($path);
        }

        # simpan data inputan ke database
        Book::create($validated);

        # buat notif ketika data berhasil diinput ke database
        $notif = array(
            'message' => 'Buku berhasil ditambahkan',
            'alert-type' => 'success'
        );

        # redirect ke halman daftar buku / masih di halaman form
        if($request->save){
            return redirect()->route('books.index')->with($notif);
        } else {
            return redirect()->route('books.create')->with($notif);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['books'] = Book::findOrFail($id);
        $data['bookshelves'] = Bookshelf::pluck('name', 'id');

        return view('books.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $books = Book::findOrFail($id);
       $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:150',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')),
            'publisher' => 'required|max:100',
            'city' => 'required|max:75',
            'bookshelf_id' => 'required',
            'cover' => 'nullable|image',
        ]);

        if($request->hasFile('cover')){
            if ($books->cover && Storage::exists('public/cover_buku/' . $books->cover)) {
            Storage::delete('public/cover_buku/' . $books->cover);
        }
            $path = $request->file('cover')->storeAs(
            'cover_buku',
            'cover_buku_'.time() . '.' . $request->file('cover')->extension(),
            'public'
            );
            $validated['cover'] = basename($path);
        }

        Book::where('id', $id)->update($validated);

        $notification = array(
            'message' => "Data buku berhasil diperbaharui!",
            'alert-type' => 'success'
        );

        return redirect()->route('books.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Book::findOrFail($id);

        if ($books->cover && Storage::exists('public/cover_buku/' . $books->cover)) {
            Storage::delete('public/cover_buku/' . $books->cover);
        }

        Book::destroy($id);

        $notification = array(
            'message' => "Data buku berhasil dihapus!",
            'alert-type' => 'success'
        );

        return redirect()->route('books.index')->with($notification);
    }
}
