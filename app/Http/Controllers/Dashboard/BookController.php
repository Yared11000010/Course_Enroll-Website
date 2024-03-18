<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('view store')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $books = Book::all();

            return view('book.index', compact('books'));
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('create store')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            return view('book.create');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('create store')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            if (!$request->isMethod('post')) {
                // Handle the error - Method not allowed
                Alert::toast('Method not allowed', 'error');
                return redirect()->back(); // You can redirect to an appropriate location
            }
            $request->validate([
                'title' => 'required',
                'summernote'=>'required',
            ]);

            $orderCode = $this->generateOrderCode();
            $book = new Book();

            if ($request->hasFile('image')) {
                $fileNameWithExt = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('image')->storeAs('public/book/', $fileNameToStore);

                //   $image = Image::make(public_path('storage/book/' . $fileNameToStore));

                //   $image->resize(139, 97)->save(public_path('storage/book/' . $fileNameToStore));
                $book->image = $fileNameToStore;
            }

            if ($request->hasFile('file')) {
                $fileNameWithExt = $request->file('file')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('file')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('file')->storeAs('public/book/', $fileNameToStore);

                //   $image = Image::make(public_path('storage/book/' . $fileNameToStore));

                //   $image->resize(139, 97)->save(public_path('storage/book/' . $fileNameToStore));
                $book->pdf_file = $fileNameToStore;
            }
            // $book->pdf_file = $request->input('pdf_file');

            $book->type= $request->input('type');
            $book->order_code= $orderCode;
            $book->title = $request->input('title');
            $book->description=$request->input('summernote');
            $book->price=$request->input('price');
            $book->status = 1;
            $book->save();

            Alert::toast('book has been saved successfully!', 'success');
            return redirect()->route('books');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Laravel's built-in validation exception
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('edit store')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $books = Book::find($id);

            return view('book.edit', compact('books'));
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        // try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('edit store')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            if (!$request->isMethod('put')) {
                // Handle the error - Method not allowed
                Alert::toast('Method not allowed', 'error');
                return redirect()->route('books'); // You can redirect to an appropriate location
            }
            $request->validate([
                'title' => 'required',
                'summernote'=>'required',
            ]);

            $book = Book::find($request->input('id'));

            if ($request->hasFile('image')) {

                if ($book->image) {
                    Storage::delete('public/book/' . $book->image);
                }
                $fileNameWithExt = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('image')->storeAs('public/book/', $fileNameToStore);

                //   $image = Image::make(public_path('storage/book/' . $fileNameToStore));

                //   $image->resize(139, 97)->save(public_path('storage/book/' . $fileNameToStore));
                $book->image = $fileNameToStore;
            }
            if ($request->hasFile('file')) {

                if ($book->pdf_file) {
                    Storage::delete('public/book/' . $book->pdf_file);
                }
                $fileNameWithExt = $request->file('file')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('file')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('file')->storeAs('public/book/', $fileNameToStore);

                //   $image = Image::make(public_path('storage/book/' . $fileNameToStore));

                //   $image->resize(139, 97)->save(public_path('storage/book/' . $fileNameToStore));
             $book->pdf_file = $fileNameToStore;
            }
            $book->title = $request->input('title');
            $book->type= $request->input('type');
            // $book->pdf_file = $request->input('pdf_file');

            $book->description=$request->input('summernote');
            $book->price=$request->input('price');
            $book->update();

            Alert::toast('book has been updated successfully!', 'success');
            return redirect()->route('books');
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     // Laravel's built-in validation exception
        //     return redirect()->back()->withErrors($e->validator->errors())->withInput();
        // } catch (\Exception $e) {
        //     // Handle exceptions or errors
        //     Alert::toast('something is wrong!!', 'error');
        //     return redirect()->back();
        // }
    }

    public function delete($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('delete store')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $book = Book::find($id);
            if ($book->image) {
                Storage::delete('public/book/' . $book->image);
            }
            if ($book->pdf_file) {
                Storage::delete('public/book/' . $book->pdf_file);
            }
            $book->delete();
            Alert::toast('book has been deleted successfully!', 'error');
            return redirect()->route('Book');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function active($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('edit store')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $book = Book::find($id);
            $book->status = 1;
            $book->save();

            Alert::toast('book has been activated!', 'success');
            return redirect()->route('books');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function inactive($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('edit store')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $book = Book::find($id);
            $book->status = 0;
            $book->save();

            Alert::toast('book has been inactivated successfully!', 'error');
            return redirect()->route('books');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    private function generateOrderCode()
    {
        // Generate a random 10-digit number
        $randomNumber = Str::random(10);

        // Check if the code already exists, if so, regenerate
        while (Book::where('order_code', $randomNumber)->exists()) {
            $randomNumber = Str::random(10);
        }

        return $randomNumber;
    }
}
