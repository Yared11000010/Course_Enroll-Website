<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Blogs;
use App\Models\Book;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CoursePDF;
use App\Models\FAQ;
use App\Models\Lesson;
use App\Models\NewsLetter;
use App\Models\Order;
use App\Models\PdfOrder;
use App\Models\Testmony;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MainContorller extends Controller
{
    //
    public function index(){

        $course_category=CourseCategory::all();
        $course=Course::where('type','paid')->get();
        $books=Book::where('status',1)->get();
        $count_course=Course::count();
        $count_user=User::count();
        $testmony=Testmony::where('status',1)->get();
        $banners=Banner::where('status',1)->get();
        return view('Frontend.layouts.index',compact('course_category','course','count_course','count_user','books','banners','testmony'));
    }

    public function category($id){
        $category=CourseCategory::find($id)->first();
        $courses=Course::where('category_id',$id)->get();
        return view('Frontend.pages.course.category.index',compact('courses','category'));
    }

    public function consltation(){

        return view('Frontend.pages.consultation.index');
    }






    //for book store
    public function shop(){

        $books=Book::where('status',1)->where('type','paid')->get();
        return view('Frontend.pages.store.store',compact('books'));
    }
    public function shop_details($id){

        $book=Book::find($id);
        return view('Frontend.pages.store.shop-details',compact('book'));
    }

    public function enroll_book($order_code){
        $user_id = auth()->user()->id;

        $order=PdfOrder::where('user_id',$user_id)->get();

        $books=Book::where('order_code',$order_code)->first();

        foreach($order as $or){
            if($or->pdf_id == $books->id){
                Alert::toast('Opps!! You have already Enrolled this Course!','info');
                return redirect()->back();
             }
        }

        return view('Frontend.pages.store.enroll.checkout',compact('books'));
    }








    public function  about() {

        $about_us=AboutUs::first();
        return view('Frontend.pages.about.about',compact('about_us'));
    }

    public function courses(){

        $courses=Course::with('category','youtubeLinks','pdfs','lessons')->where('status',1)->where('type','paid')->get();
        // dd($courses);
        return view('Frontend.pages.course.course',compact('courses'));
    }

    public function coursedetails($id){

        $category=CourseCategory::with('courses')->get();
        $latestCourse=Course::latest()->take(3)->get();
        $fivecourse=Course::latest()->take(5)->get();
        $course=Course::with('category','youtubeLinks','pdfs','lessons')->where('course_code',$id)->first();
        // dd($course);
        return view('Frontend.pages.course.course_details',compact('course','latestCourse','fivecourse','category'));
    }

    public function getCoursesByCategory($categoryId) {
        $category = CourseCategory::findOrFail($categoryId);
        $courses = $category->courses()->get();

        return view('Frontend.pages.course.course_list_partial', compact('courses'));
    }

    public function getBlogByCategory($categoryId) {
        $blog = BlogCategory::findOrFail($categoryId);
        $blogs = $blog->blogs()->get();

        return view('Frontend.pages.blogs.blog_list_partial', compact('blogs'));
    }


    public function freecourse(){
        $courses=Course::where('type','free')->get();
        // dd($courses);

        return view('Frontend.pages.course.free_course.index',compact('courses'));
    }

    public function freecoursedetail($course_code){
          // Google Drive video link
          $googleDriveLink = "https://drive.google.com/file/d/192E6jyxjPHGYMTMTjlTgrhkvPL6J78hp/preview";

          // Encrypt the link
          $encryptedLink = Crypt::encryptString($googleDriveLink);
        $cor=Course::with('category','youtubeLinks','pdfs','lessons')->where('type','free')->where('course_code',$course_code)->first();
        // dd($cor);
        // foreach( $course as $cor){
        //  $cor->where('course_code',$course_code)->first();
        //  }
        //  dd($cor);
         $lessons=Lesson::where('course_id',$cor->id)->paginate(1);
        //  dd($lessons);

        //   dd($cor);
        return view('Frontend.pages.course.free_course.details',compact('cor','encryptedLink','lessons'));
    }

    public function decryptLink(Request $request)
    {
        // Decrypt the encrypted link
        $decryptedLink = Crypt::decryptString($request->input('encryptedLink'));

        // Return the decrypted link as JSON
        return response()->json(['decryptedLink' => $decryptedLink]);
    }


    public function enroll($id){


        $user_id = auth()->user()->id;
        if (is_null($user_id)) {
          Alert::toast("Please login  first before enroll a course", "info");
         return redirect()->back();
        }
        $order=Order::where('user_id',$user_id)->get();
        $course=Course::where('course_code',$id)->first();
        foreach($order as $or){
            if($or->course_id == $course->id){
                Alert::toast('Opps!! You have already Enrolled this Course!','info');
                return redirect()->back();
             }
        }

        return view('Frontend.pages.course.enroll.index',compact('course'));
    }


    public function mylearn(){

        $order_courses = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        // Initialize an empty array to store the enrolled courses
        $enrolled_courses = [];
        foreach ($order_courses as $order) {
            // Retrieve the course for the current order
            $course = Course::find($order->course_id);
            // dd($course);
            // If the course is found, add it to the array of enrolled courses
            if ($course) {
                $enrolled_courses[] = $course;
            }
        }
        // dd($enrolled_courses);
    //     $enrolled_courses = collect($enrolled_courses)->sortByDesc('id')->values()->all();
    //    dd($enrolled_courses);

        return view('Frontend.pages.course.mylearn.index',compact('enrolled_courses'));
    }


    //for pdf
    public function mypdf(){

        $order_pdf = PdfOrder::where('user_id', Auth::user()->id)->get();
        // dd($order_pdf);
        $enrolled_pdfs = [];
        foreach ($order_pdf as $order) {
            $pdf = Book::find($order->pdf_id);
            if ($pdf) {
                $enrolled_pdfs[] = $pdf;
            }
        }
        // dd($enrolled_pdfs);

        return view('Frontend.pages.store.mylearn.index',compact('enrolled_pdfs'));

    }

    public function show($id)
    {

        $book = Book::findOrFail($id);
        $pdfPath = storage_path('app/public/book/' . $book->pdf_file); // Assuming 'pdf_path' is the column storing the file path

        return response()->file($pdfPath);
    }


    public function show_course_pdf($id){
         $course_pdf=Course::findOrFail($id);
        //   dd($course_pdf);
         $pdfPath = storage_path('app/public/course/' . $course_pdf->pdf_file);
         return response()->file($pdfPath);
    }

    public function show_lesson_pdf($id){
        $lesson_pdf=Lesson::findOrFail($id);
        $pdfPath = storage_path('app/public/lesson/' . $lesson_pdf->pdf_file);
        return response()->file($pdfPath);
   }

   public function show_paid_lesson_pdf($id){
    $lesson_pdf=Lesson::findOrFail($id);
    //  dd($lesson_pdf);
    $pdfPath = storage_path('app/public/lesson/' . $lesson_pdf->pdf_file);
    return response()->file($pdfPath);
    }


    public function mypdf_detail($order_code){
        $pdf = Book::where('order_code', $order_code)->first();

        $pdf_order = PdfOrder::where('pdf_id', $pdf->id)
                            ->where('user_id', Auth::id())
                            ->where('status','paid')
                            ->first();
        // dd($pdf_order);

        if ($pdf_order) {
            return view('Frontend.pages.store.mylearn.mylearn_detail',compact('pdf'));
        } else {
            Alert::toast('No such file is available','error');
            return redirect()->back();
        }

    }

    public function download_pdf_file(Request $request,$file){

            return response()->download(public_path('storage/book/'.$file));

    }
    public function check_book_order_transactions(Request $request){

        // dd($request->input('book_id'));
        $order=PdfOrder::where('user_id',Auth::user()->id)->where('pdf_id',$request->input('book_id'))->first();
        // dd($order);
        // if($order->payment_reference===$request->input('reference')){

            if ($request->hasFile('image')) {
                $fileNameWithExt = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('image')->storeAs('public/orders/', $fileNameToStore);
                //   $image = Image::make(public_path('storage/book/' . $fileNameToStore));

                //   $image->resize(139, 97)->save(public_path('storage/book/' . $fileNameToStore));
                $order->payment_receipt = $fileNameToStore;
            }

        //    $order->status="paid";
           $order->update();
           Alert::toast('Your payment receipt sent successfully','success');
           return redirect()->back();
        // }else{
        //     Alert::toast('Your payment reference number is not correct insert correct payment reference number to verify your payment','error');
        //     return redirect()->back();
        // }
    }

    public function freepdf(){
        $pdf=Book::where('type','free')->get();
        // dd($courses);

        return view('Frontend.pages.store.free_pdf.index',compact('pdf'));
    }

    public function freepdfetails($order_code){
        $course=Book::where('type','free')->get();
        foreach( $course as $pdf){
         $pdf->where('order_code',$order_code)->first();
         }

        return view('Frontend.pages.store.free_pdf.details',compact('pdf'));
    }






    public function mylearn_detail($course_code){
        $course=Course::with('category','youtubeLinks','pdfs','lessons')->where('course_code',$course_code)->first();
        // dd($course);
        $courses=Order::where('course_id', $course->id)
        ->where('user_id', Auth::id())
        ->where('status','paid')
        ->first();
        // dd($courses);
        if ($courses) {
            $lessons=Lesson::where('course_id',$course->id)->paginate(1);
            return view('Frontend.pages.course.mylearn.mylearn_detail',compact('course','lessons'));
        } else {
            Alert::toast('No such course is available','error');
            return redirect()->back();
        }
    }
    public function download_file(Request $request,$file){

         return response()->download(public_path('storage/course/'.$file));

    }



    public function check_transactions(Request $request){

        $order=Order::where('user_id',Auth::user()->id)->where('course_id',$request->input('course_id'))->first();
        // // dd($request->input('course_id'));
        // if($order->payment_reference===$request->input('reference')){

            if ($request->hasFile('image')) {
                $fileNameWithExt = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('image')->storeAs('public/orders/', $fileNameToStore);
                //   $image = Image::make(public_path('storage/book/' . $fileNameToStore));
                //   $image->resize(139, 97)->save(public_path('storage/book/' . $fileNameToStore));
                $order->payment_receipt = $fileNameToStore;
            }

        //    $order->status="paid";
           $order->update();
           Alert::toast('Your payment receipt sent successfully','success');
           return redirect()->back();
        // }else{

        //     Alert::toast('Your payment reference number is not correct insert correct payment reference number to verify your payment','error');
        //     return redirect()->back();
        // }
    }

    public function blogs(){

        $blog_category=BlogCategory::where('status',1)->get();
        $blogs=Blogs::where('status',1)->paginate(2);
        $latestFiveBlogs = Blogs::latest()->take(5)->get();
        $latestCourse=Course::latest()->take(5)->get();

        return view('Frontend.pages.blogs.blogs',compact('blog_category','blogs','latestFiveBlogs','latestCourse'));
    }

    public function blog_details($id){

        $latestFiveBlogs = Blogs::latest()->take(5)->get();
        $latestCourse=Course::latest()->take(5)->get();
        $blog_category=BlogCategory::where('status',1)->get();

        $blogs=Blogs::findOrFail($id);
        if($blogs){
            $blog_comment = BlogComment::where('blog_id', $id)
            ->where('status', 1)
            ->simplePaginate(4);
            // dd($blog_comment);
            $count_blog_comment=$blog_comment->count();
            return view('Frontend.pages.blogs.blogdetails',compact('blog_category','blogs','latestFiveBlogs','latestCourse','blog_comment','count_blog_comment'));
        }
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $latestFiveBlogs = Blogs::latest()->take(5)->get();
        $latestCourse=Course::latest()->take(5)->get();
        $blog_category=BlogCategory::where('status',1)->get();

        $blogs = Blogs::where('title', 'like', "%$query%")
                            ->orWhere('description', 'like', "%$query%")
                            ->paginate(10);

        return view('Frontend.pages.blogs.blog_list_partial', ['blogs' => $blogs,'latestFiveBlogs'=>$latestFiveBlogs,'latestCourse'=>$latestCourse,'blog_category'=>$blog_category]);
    }

    public function send_comment(Request $request){

        $request->validate([
            'name' => 'required',
            'email'=>'required',
            'comments'=>'required'
        ]);
        // dd($request->all());


        $comment = new BlogComment();
        $comment->fullname = $request->input('name');
        $comment->email = $request->input('email');
        $comment->comment = $request->input('comments');
        $comment->blog_id= $request->input('id');
        $comment->status = 1;
        $comment->save();

        Alert::toast('Blog comment has been send!', 'success');
        return redirect()->back();
    }

    public function contact(){

        return view('Frontend.pages.contact.contact');
    }

    public function faq(){

        $faq=FAQ::where('status',1)->get();
        return view('Frontend.pages.faq.faq',compact('faq'));
    }


    public function newsletter(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'email|string|unique:newsletter_subscribers,email',
        ]);
        if ($validator->fails()) {
            Alert::toast('Subscriber email already exists', 'error');
            return redirect()->back();
        } else {
        // dd($request->all());
        $newsletter=new NewsLetter();
        $newsletter->email=$request->input('email');
        $newsletter->status=1;
        $newsletter->save();

        Alert::toast('You are subscribed to our newsletter!','success');
        return redirect()->back();

        }
    }


}
