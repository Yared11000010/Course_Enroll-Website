<?php

namespace App\Http\Controllers\Dashboard\Course\Lesson;

use App\Models\Lesson;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\lessonYoutubeLink;
use App\Models\Order;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class LessonController extends Controller
{
    //
    public function index()
    {
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('view course')) {
            Alert::toast('You dont have access to this page.', 'error');
            return redirect()->back();
        }
        $alllessons = lesson::all();
        return view('course.lesson.index', compact('alllessons'));
    }

    public function view_lesson_pdf($lesson_code)
    {
        try {
            $book = Lesson::where('lesson_code', $lesson_code)->first();
            $course = Course::where('id',$book->course_id)->first();
            if ($course->type === "free") {
                // dd(1);
                if ($book) {
                    return view('Frontend.pages.course.pdf.lesson_pdf', compact('book'));
                } else {
                    Alert::toast('something is wrong', 'error');
                    return redirect()->back();
                }
            }

            if($course->type ==="paid") {
                $check = Order::where('course_id', $course->id)->where('user_id', Auth::user()->id)->first();
                if (!$check) {
                    Alert::toast('You don`t have permission to access this pdf!', 'error');
                    return redirect()->back();
                } else {
                    if ($book) {
                        return view('Frontend.pages.course.pdf.lesson_pdf', compact('book'));
                    } else {
                        Alert::toast('something is wrong', 'error');
                        return redirect()->back();
                    }
                }
            }
            //    dd($book);
        } catch (\Exception $e) {
            Alert::toast('Failed Please try again.', 'error');
            return redirect()->back();
        }
    }
    public function create()
    {
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('add course')) {
            Alert::toast('You dont have access to this page.', 'error');
            return redirect()->back();
        }
        $course = Course::all();
        return view('course.lesson.create', compact('course'));
    }

    public function store(Request $request)
    {
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('add course')) {
            Alert::toast('You dont have access to this page.', 'error');
            return redirect()->back();
        }
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'image' => 'required|image',
            'summernote' => 'required',
        ]);

        $orderCode = $this->generateOrderCode();

        $lesson = new lesson();
        $lesson->title = $request->input('title');
        $lesson->lesson_code = $orderCode;
        $lesson->course_id = $request->input('course_id');
        $lesson->description = $request->input('summernote');

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $path = $request->file('image')->storeAs('public/lesson/', $fileNameToStore);
            $lesson->image = $fileNameToStore;
        }

        if ($request->hasFile('video')) {

            $fileNameWithExt = $request->file('video')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('video')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $path = $request->file('video')->storeAs('public/lesson/video/', $fileNameToStore);
            $lesson->video = $fileNameToStore;
        }

        if ($request->hasFile('pdf')) {

            $fileNameWithExt = $request->file('pdf')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('pdf')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $path = $request->file('pdf')->storeAs('public/lesson/', $fileNameToStore);
            $lesson->pdf_file = $fileNameToStore;
        }


        $lesson->save();

        Alert::toast('lesson has been added', 'success');
        return redirect()->route('all-lessons');
    }

    public function edit($id)
    {
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('edit course')) {
            Alert::toast('You dont have access to this page.', 'error');
            return redirect()->back();
        }
        $lesson = lesson::findOrFail($id);
        $videoPath = asset('/storage/lesson/video/' . $lesson->video);

        $course = Course::all();
        if ($lesson) {
            return view('course.lesson.edit', compact('lesson', 'course', 'videoPath'));
        }
    }
    public function update(Request $request)
    {

        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('edit course')) {
            Alert::toast('You dont have access to this page.', 'error');
            return redirect()->back();
        }
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'image' => 'nullable|image',
            'summernote' => 'required',
        ]);

        $lesson = lesson::findOrFail($request->input('id'));

        $lesson->title = $request->input('title');
        $lesson->course_id = $request->input('course_id');
        $lesson->description = $request->input('summernote');

        // Update lesson image if provided
        if ($request->hasFile('image')) {

            Storage::delete('public/lesson/' . $lesson->image);
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $path = $request->file('image')->storeAs('public/lesson/', $fileNameToStore);
            $lesson->image = $fileNameToStore;
        }

        if ($request->hasFile('video')) {

            Storage::delete('public/lesson/video/' . $lesson->video);
            $fileNameWithExt = $request->file('video')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('video')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $path = $request->file('video')->storeAs('public/lesson/video/', $fileNameToStore);
            $lesson->video = $fileNameToStore;
        }
        // $lesson->video = $request->input('video');

        if ($request->hasFile('pdf')) {

            Storage::delete('public/lesson/'.$lesson->pdf_file);
            $fileNameWithExt = $request->file('pdf')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('pdf')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $path = $request->file('pdf')->storeAs('public/lesson/', $fileNameToStore);
            $lesson->pdf_file = $fileNameToStore;
        }
        // $lesson->pdf_file = $request->input('pdf_file');

        // Update PDF files if provided

        $lesson->update();

        Alert::toast('lesson has been updated', 'success');
        return redirect()->route('all-lessons');
    }

    public function delete($id)
    {
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('delete course')) {
            Alert::toast('You dont have access to this page.', 'error');
            return redirect()->back();
        }
        $lesson = lesson::find($id);

        if ($lesson) {
            Storage::delete('public/lesson/' . $lesson->image);
            Storage::delete('public/lesson/video/' . $lesson->video);
            Storage::delete('public/lesson/' . $lesson->pdf_file);
            $lesson->delete();

            Alert::toast('Lesson has been deleted', 'success');
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
            $lesson = lesson::find($id);
            $lesson->status = 1;
            $lesson->save();

            Alert::toast('lesson has been activated!', 'success');
            return redirect()->route('all-lessons');
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
            $lesson = lesson::find($id);
            $lesson->status = 0;
            $lesson->save();

            Alert::toast('lesson has been inactivated successfully!', 'error');
            return redirect()->route('all-lessons');
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

        while (Lesson::where('lesson_code', $randomNumber)->exists()) {
            $randomNumber = Str::random(10);
        }

        return $randomNumber;
    }
}
