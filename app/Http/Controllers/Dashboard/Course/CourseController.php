<?php

namespace App\Http\Controllers\Dashboard\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseYoutubeLink;
use App\Models\Order;
use Exception;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{


    public function index()
    {
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('view course')) {
            Alert::toast('You dont have access to this page.', 'error');
            return redirect()->back();
        }
        $allcourses = Course::all();
        return view('course.index', compact('allcourses'));
    }

    public function create()
    {
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('add course')) {
            Alert::toast('You dont have access to this page.', 'error');
            return redirect()->back();
        }
        $category = CourseCategory::all();
        return view('course.create', compact('category'));
    }

    public function view_course_pdf($course_code){
        try {

            $book=Course::where('course_code',$course_code)->first();
            if($book->type==="free"){
                if($book){
                    return view('Frontend.pages.course.pdf.course_pdf',compact('book'));
                    }else{
                       Alert::toast('something is wrong','error');
                       return redirect()->back();
                   }
            }
            $book_id=$book->id;
            $order=Order::where('user_id',Auth::user()->id)->where('course_id',$book_id)->get();
            if(!$order){
                Alert::toast('You don`t have permission to access this pdf!','error');
                return redirect()->back();
            }else{
            //    dd($book);
            if($book){
            return view('Frontend.pages.course.pdf.course_pdf',compact('book'));
            }else{
               Alert::toast('something is wrong','error');
               return redirect()->back();
           }
           }

        } catch (\Exception $e) {
            Alert::toast('Failed Please try again.', 'error');
            return redirect()->back();
        }

    }

    public function store(Request $request)
    {

        if ($request->method() !== 'POST') {
            Alert::toast('Invalid request method.', 'error');
            return redirect()->back();
        }
        try {

            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('add course')) {
                Alert::toast('You dont have access to this page.', 'error');
                return redirect()->back();
            }
            $request->validate([
                'category_id' => 'required',
                'title' => 'required',
                'image' => 'required|image',
                'summernote' => 'required',
                'pdf' => 'required|mimes:pdf,xlx,csv',
                'type' => 'required',
                'price' => 'required',

            ]);

            $orderCode = $this->generateOrderCode();

            $course = new Course();
            $course->title = $request->input('title');
            $course->course_code = $orderCode;
            $course->category_id = $request->input('category_id');
            $course->description = $request->input('summernote');
            $course->type = $request->input('type');


            if ($request->hasFile('image')) {
                $fileNameWithExt = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('image')->storeAs('public/course/', $fileNameToStore);
                $course->image = $fileNameToStore;
            }


            if ($request->hasFile('video')) {
                $fileNameWithExt = $request->file('video')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('video')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('video')->storeAs('public/course/video/', $fileNameToStore);
                $course->video = $fileNameToStore;
            }
            // $lesson->video = $request->input('video');

            if ($request->hasFile('pdf')) {

                $fileNameWithExt = $request->file('pdf')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('pdf')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('pdf')->storeAs('public/course/', $fileNameToStore);
                $course->pdf_file = $fileNameToStore;
            }

            $course->save();


            Alert::toast('Course has been added', 'success');
            return redirect()->route('all-courses');
        } catch (\Exception $e) {
            Alert::toast('Failed to add course. Please try again.', 'error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('edit course')) {
            Alert::toast('You dont have access to this page.', 'error');
            return redirect()->back();
        }
        $course = Course::findOrFail($id);
        $videoPath = asset('/storage/course/video/' . $course->video);

        $category = CourseCategory::all();

        if ($course) {
            return view('course.edit', compact('course', 'category', 'videoPath'));
        }
    }
    public function update(Request $request)
    {
        if ($request->method() !== 'PUT') {
            Alert::toast('Invalid request method.', 'error');
            return redirect()->back();
        }
        try {


            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('edit course')) {
                Alert::toast('You dont have access to this page.', 'error');
                return redirect()->back();
            }
            $request->validate([
                'category_id' => 'required',
                'title' => 'required',
                'image' => 'nullable|image',
                'summernote' => 'required',
                'pdf' => 'nullable|mimes:pdf,xlx,csv',
                'type' => 'required',
                'price' => 'required',
            ]);

            $course = Course::findOrFail($request->input('id'));

            $course->title = $request->input('title');
            $course->category_id = $request->input('category_id');
            $course->description = $request->input('summernote');
            $course->type = $request->input('type');
            $course->price = $request->input('price');

            // Update course image if provided
            if ($request->hasFile('image')) {

                Storage::delete('public/course/' . $course->image);
                $fileNameWithExt = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('image')->storeAs('public/course/', $fileNameToStore);
                $course->image = $fileNameToStore;
            }

            if ($request->hasFile('video')) {

                Storage::delete('public/course/video/' . $course->video);
                $fileNameWithExt = $request->file('video')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('video')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('video')->storeAs('public/course/video/', $fileNameToStore);
                $course->video = $fileNameToStore;
            }
            // $lesson->video = $request->input('video');

            if ($request->hasFile('pdf')) {

                Storage::delete('public/course/'.$course->pdf_file);
                $fileNameWithExt = $request->file('pdf')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('pdf')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('pdf')->storeAs('public/course/', $fileNameToStore);
                $course->pdf_file = $fileNameToStore;
            }
            // $lesson->pdf_file = $request->input('pdf_file');



            $course->update();
            Alert::toast('Course has been updated', 'success');
            return redirect()->route('all-courses');
        } catch (\Exception $e) {
            Alert::toast('Failed to add course. Please try again.', 'error');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('delete course')) {
            Alert::toast('You dont have access to this page.', 'error');
            return redirect()->back();
        }
        $course = Course::find($id);

        if ($course) {
            Storage::delete('public/course/' . $course->image);
            Storage::delete('public/course/' . $course->pdf_file);
            Storage::delete('public/course/video/' . $course->video);

            $course->delete();

            Alert::toast('Successfully deleted the course.', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Something is wroing', 'error');
            return redirect()->back();
        }
    }

    public function active($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('edit course')) {
                Alert::toast('You dont have access to this page.', 'error');
                return redirect()->back();
            }
            $course = Course::find($id);
            $course->status = 1;
            $course->save();

            Alert::toast('course has been activated!', 'success');
            return redirect()->route('all-courses');
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
            if (!$user || !$user->hasPermissionByRole('edit course')) {
                Alert::toast('You dont have access to this page.', 'error');
                return redirect()->back();
            }
            $course = Course::find($id);
            $course->status = 0;
            $course->save();

            Alert::toast('course has been inactivated successfully!', 'error');
            return redirect()->route('all-courses');
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
        while (Course::where('course_code', $randomNumber)->exists()) {
            $randomNumber = Str::random(10);
        }

        return $randomNumber;
    }
}
