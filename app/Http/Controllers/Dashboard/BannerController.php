<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    public function banners(Request $request)
    {
        // try {
            $banners = Banner::get();

            if ($request->isMethod('post')) {
                $this->validate($request, [
                    'title' => 'required|string',
                    'image'=>'required|image',
                ]);

                // Validation passed, proceed with creating the banner

                $banner = new Banner();

                    if($request->hasFile('image')){
                        //get file name with ext
                        $fileNameWithExt=$request->file('image')->getClientOriginalName();
                        //get just file name
                        $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                        //get just file extenstion
                        $extension=$request->file('image')->getClientOriginalExtension();
                        //file name to store
                        $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                        //upload image
                        $path=$request->file('image')->storeAs('public/banner',$fileNameToStore);

                        // $image = Image::make(public_path('storage/banner/' . $fileNameToStore));

                        // $image->resize(1110, 192)->save(public_path('storage/banner/' . $fileNameToStore));

                        $banner->image=$fileNameToStore;
                       }


                // Assign other banner properties
                $banner->link = $request->input('link');
                $banner->title = $request->input('title');
                $banner->status = 1;

                $banner->save();

                Alert::toast('Banner has been saved', 'success');
                return redirect()->route('banners');
            }

            return view('banner.index', compact('banners'));
            // ... (the rest of your code)
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     // Laravel's built-in validation exception
        //     return redirect()->back()->withErrors($e->validator->errors())->withInput();
        // } catch (\Exception $e) {
        //     // Handle other exceptions or errors
        //     Alert::toast('Something went wrong!!', 'error');
        //     return redirect()->back();
        // }
    }

    public function create()
    {
        try {

            return view('banner.create');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    // public function store(Request $request){


    // }

    public function edit($id)
    {
        try {
            $banner = Banner::find($id);

            if (!$banner) {
                // Handle the case where the banner is not found
                Alert::toast('Banner not found', 'error');
                return redirect()->back();
            }

            return view('banner.edit', compact('banner'));
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('Error editing banner: ' . $e->getMessage(), 'error');
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        try {
            if (!$request->method('put')) {
                // Handle exceptions or errors
                Alert::toast('something is wrong!!', 'error');
                return redirect()->back();
            }
            $this->validate($request, [
                'link' => 'required|string',
                'title' => 'required|string',
            ]);

            $banner = Banner::find($request->input('id'));

            if (!$banner) {
                // Handle the case where the banner is not found
                Alert::toast('Banner not found', 'error');
                return redirect('admin/banners');
            }

            $banner->link = $request->input('link');
            $banner->title = $request->input('title');

                if($request->hasFile('image')){
                    if($banner->image) {
                        Storage::delete('public/banner/'.$banner->image);
                      }
                    //get file name with ext
                    $fileNameWithExt=$request->file('image')->getClientOriginalName();
                    //get just file name
                    $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                    //get just file extenstion
                    $extension=$request->file('image')->getClientOriginalExtension();
                    //file name to store
                    $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                    //upload image
                    $path=$request->file('image')->storeAs('public/banner',$fileNameToStore);

                    // $image = Image::make(public_path('storage/banner/' . $fileNameToStore));

                    // $image->resize(1200, 400)->save(public_path('storage/banner/' . $fileNameToStore));

                    $banner->image=$fileNameToStore;
                   }

            $banner->update();

            Alert::toast('Banner has been updated', 'success');
            return redirect()->route('banners');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Laravel's built-in validation exception
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    // for active and inactive admin type

    public function active_banner($banner_id)
    {
        try {

            $banner = Banner::find($banner_id);
            $banner->status = 1;
            $banner->update();

            Alert::toast('Banner Status Acitve', 'success');
            return redirect('admin/banners');
        }
        catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }


    public function inactive_banner($banner_id)
    {
        try {

            $banner = Banner::find($banner_id);
            $banner->status = 0;
            $banner->update();

            Alert::toast('Banner Status Inactive', 'error');
            return redirect()->route('banners');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function delete($banner_id)
    {
        try {

            $banner = Banner::find($banner_id);


            if ($banner->image) {
                Storage::delete('public/banner/' . $banner->image);
            }

            $banner->delete();

            Alert::toast('Banner has been deleted', 'success');
            return redirect()->route('banners');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }
}
