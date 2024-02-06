<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    protected $limit=5;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students=Student::latest()->simplePaginate($this->limit);
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'image'=>'required|mimes:png,jpg,jpeg'
        ]);

        // Get Form Image
        $image = $request->file('image');
        if (isset($image)) {

            // Make Unique Name for Image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Check StudentImg Dir is exists
            if (!Storage::disk('public')->exists('studentImg')) {
                Storage::disk('public')->makeDirectory('studentImg');
            }

            // Resize Image for student and upload
            $student = Image::make($image)->resize(225,225)->stream();
            Storage::disk('public')->put('studentImg/' . $imagename, $student);

        } else {
            $imagename = 'default.png';
        }

       $student=new Student();
       $student->name=$request->name;
       $student->phone=$request->phone;
       $student->address=$request->address;
       $student->email=$request->email;
       $student->image=$imagename;
       $student->save();
       $notification = array(
           'message' => 'student Inserted Successfully',
           'alert-type' => 'success'
       );
       return redirect()->route('students.index')
              ->with($notification);
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
        $student=Student::findOrFail($id);
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Get Form Image
         $image = $request->file('image');
         $student=Student::find($id);
         if (isset($image)) {

             // Make Unique Name for Image
             $currentDate = Carbon::now()->toDateString();
             $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

             // Check Stuent Dir is exists
             if (!Storage::disk('public')->exists('studentImg')) {
                 Storage::disk('public')->makeDirectory('studentImg');
             }

             // Delete Old Image
            if (Storage::disk('public')->exists('studentImg/' . $student->image)) {
                Storage::disk('public')->delete('studentImg/' . $student->image);
            }

             // Resize Image for student and upload
             $student = Image::make($image)->resize(300,200)->stream();
             Storage::disk('public')->put('studentImg/' . $imagename, $student);

         } else {
            $imagename = $student->image;
         }


        $student=Student::find($id);
        $student->name=$request->name;
        $student->phone=$request->phone;
        $student->address=$request->address;
        $student->email=$request->email;
        $student->image=$imagename;
        $student->save();
        $notification = array(
            'message' => 'Stuent Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('students.index')
               ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        // Delete Old Image
           if (Storage::disk('public')->exists('studentImg/'.$student->image)) {
               Storage::disk('public')->delete('studentImg/'.$student->image);
             }

             $student->delete();
             $notification = array(
                 'message' => 'Student Delete Successfully',
                 'alert-type' => 'error'
             );
              return redirect()->route('students.index')
              ->with($notification);
    }
}
