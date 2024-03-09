<?php

namespace App\Http\Controllers\Dashboard\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseYoutubeLink;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{
    //


    public function index(){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('view course')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $allcourses=Course::all();
        return view('course.index',compact('allcourses'));
    }

    public function create(){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('add course')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $category=CourseCategory::all();
        return view('course.create',compact('category'));
    }

    public function store(Request $request){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('add course')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $request->validate([

          'category_id'=>'required',
          'title'=>'required',
          'image'=>'required|image',
          'summernote'=>'required',
        //   'youtube_links.*' => 'required',
          'pdf.*' => 'required|mimes:pdf,xlx,csv|max:2048',
          'addMoreInputFields.*.subject' => 'required',

          'type'=>'required',
          'price'=>'required',

        ]);

        $orderCode = $this->generateOrderCode();

        $course= new Course();
        $course->title=$request->input('title');
        $course->course_code=$orderCode;
        $course->category_id=$request->input('category_id');
        $course->description=$request->input('summernote');
        $course->youtube_link=$request->input('youtube_link');
        $course->type=$request->input('type');

        // if ($request->hasFile('pdf')) {
        //     $fileNameWithExt = $request->file('pdf')->getClientOriginalName();
        //     $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //     $extension = $request->file('pdf')->getClientOriginalExtension();
        //     $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

        //     $path = $request->file('pdf')->storeAs('public/course/', $fileNameToStore);
        //     $course->pdf_file = $fileNameToStore;
        // }

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

        $course->price=$request->input('price');
        $course->save();

        // // Save multiple YouTube links
        // foreach ($request->input('youtube_links') as $youtubeLink) {
        //     $course->youtubeLinks()->create(['youtube_link' => $youtubeLink]);
        // }

        if ($request->hasFile('pdf')) {
            foreach ($request->file('pdf') as $pdfFile) {
                $fileNameWithExt = $pdfFile->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $pdfFile->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                $path = $pdfFile->storeAs('public/course/', $fileNameToStore);

                // Save PDF file information to the database
                $course->pdfs()->create(['file_path' => $fileNameToStore]);
            }
        }

        $data = $request->input('addMoreInputFields');

        foreach ($data as $value) {
            // CourseYoutubeLink::create([
            //     'youtube_link' => $value['subject'],
            // ]);
            $course->youtubeLinks()->create(['youtube_link'=>$value['subject']]);
        }

        Alert::toast('Course has been added','success');
       return redirect()->route('all-courses');
    }

    public function edit($id){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('edit course')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $course=Course::findOrFail($id);
        $videoPath = asset('/storage/course/video/'.$course->video);

        $category=CourseCategory::all();

        if($course){
            return view('course.edit',compact('course','category','videoPath'));
        }
    }
    public function update(Request $request){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('edit course')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'image' => 'nullable|image',
            'summernote' => 'required',
            'pdf.*' => 'nullable|mimes:pdf,xlx,csv|max:2048',
            'addMoreInputFields.*.subject' => 'nullable',
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


        // Update PDF files if provided
        if ($request->hasFile('pdf')) {
            foreach ($request->file('pdf') as $pdfFile) {
                $fileNameWithExt = $pdfFile->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $pdfFile->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                $path = $pdfFile->storeAs('public/course/', $fileNameToStore);
                // Save PDF file information to the database
                $course->pdfs()->create(['file_path' => $fileNameToStore]);
            }
        }

        // Update YouTube links
        $youtubeLinks = $request->input('addMoreInputFields');
        if (!empty($youtubeLinks)) {
            $course->youtubeLinks()->delete(); // Remove existing links
            foreach ($youtubeLinks as $link) {
                $course->youtubeLinks()->create(['youtube_link' => $link['subject']]);
            }
        }

        $course->save();

        Alert::toast('Course has been updated','success');
       return redirect()->route('all-courses');
    }

    public function delete($id){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('delete course')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $course=Course::find($id);

        if($course){
            Storage::delete('public/course/' . $course->image);
            Storage::delete('public/course/'.$course->pdf_file);
            $course->delete();

            Alert::toast('Successfully deleted the course.','success');
            return redirect()->back();
        }else{
            Alert::toast('Something is wroing','error');
            return redirect()->back();
        }
    }

    public function active($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('edit course')) {
                Alert::toast('You dont have access to this page.','error');
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
                Alert::toast('You dont have access to this page.','error');
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

