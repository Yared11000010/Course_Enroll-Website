<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BlogsCommmentController extends Controller
{

     public function index(){

        $all_blog_comments=BlogComment::paginate(10);

        return view('blogs.comment.index',compact('all_blog_comments'));
     }

     public function delete($id)
     {
         try {

             $blog = BlogComment::find($id);
             $blog->delete();

             Alert::toast('Blog commment has been deleted!', 'error');
             return redirect()->route('blog-comments');
         } catch (\Exception $e) {
             // Handle exceptions or errors
             Alert::toast('something is wrong!!', 'error');
             return redirect()->back();
         }
     }

     public function active($id)
     {
         try {

             $blog = BlogComment::find($id);
             $blog->status = 1;
             $blog->save();

             Alert::toast('Blog comment has been activated!', 'success');
             return redirect()->route('blog-comments');
         } catch (\Exception $e) {
             // Handle exceptions or errors
             Alert::toast('something is wrong!!', 'error');
             return redirect()->back();
         }
     }

     public function inactive($id)
     {
         try {

             $blog = BlogComment::find($id);
             $blog->status = 0;
             $blog->save();

             Alert::toast('Blog comment has been inactivated!', 'error');
             return redirect()->route('blog-comments');
         } catch (\Exception $e) {
             // Handle exceptions or errors
             Alert::toast('something is wrong!!', 'error');
             return redirect()->back();
         }
     }
}
