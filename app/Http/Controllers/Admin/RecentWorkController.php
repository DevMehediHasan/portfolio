<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\RecentWork;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class RecentWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recentWorks = RecentWork::all();
        return view('admin.recent_works.index',compact('recentWorks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.recent_works.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('uploads/work'))
            {
                Storage::disk('public')->makeDirectory('uploads/work');
            }
            $recentWorkImage = Image::make($image)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/work/'.$imageName,$recentWorkImage);
        }else{
            $imageName ="default.png";
        }
        $recentWork =  new RecentWork();
        $recentWork->title = $request->title;
        $recentWork->category_id = $request->category_id;
        $recentWork->slug = $slug;
        $recentWork->image = $imageName;
        $recentWork->description = $request->description;
        $recentWork->save();

        Toastr::success('Post Successfully Save', 'Success');
        return redirect()->route('admin.recent-work.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recentWorks = RecentWork::find($id);
        $categories = Category::all();
        return view('admin.recent_works.edit',compact('recentWorks','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecentWork $recentWork)
    {
                $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('uploads/work'))
            {
                Storage::disk('public')->makeDirectory('uploads/work');
            }
//            Delete Old post Image
            if (Storage::disk('public')->exists('uploads/work/'.$recentWork->image))
            {
                Storage::disk('public')->delete('uploads/work/'.$recentWork->image);
            }
            $recentWorkImage = Image::make($image)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/work/'.$imageName,$recentWorkImage);
        }else{
            $imageName ="$recentWork->image";
        }
        $recentWork->title = $request->title;
        $recentWork->category_id = $request->category_id;
        $recentWork->slug = $slug;
        $recentWork->image = $imageName;
        $recentWork->description = $request->description;
        $recentWork->save();

        Toastr::success('Post Successfully Updated', 'Success');
        return redirect()->route('admin.recent-work.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecentWork $recentWork)
    {
        if (Storage::disk('public')->exists('work/'.$recentWork->image))
        {
            Storage::disk('public')->delete('work/'.$recentWork->image);
        }
        $recentWork->delete();
        Toastr::success('Successfully Deleted');
        return back();
    }
}
