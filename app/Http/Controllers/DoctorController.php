<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\table;

class DoctorController extends Controller
{
    public function index(Request $request)
    {

        // $users = \App\Models\User::paginate(10);
        $doctors = DB::table('doctors')
        ->when($request->input('name'), function ($query, $doctor_name) {
            return $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.doctors.index', compact('doctors'));
    }

    public function create() {
        return view('pages.doctors.create');
    }

    public function store(Request $request){
        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone' => 'required',
            'doctor_email' => 'required|email',
            'address' => 'required',
            'sip' => 'required',
        ]);

        DB::table('doctors')->insert([
            'doctor_name'=>$request->doctor_name,
            'doctor_specialist'=>$request->doctor_specialist,
            'doctor_phone'=>$request->doctor_phone,
            'doctor_email'=>$request->doctor_email,
            'address'=>$request->address,
            'sip'=>$request->sip,
        ]);

        return redirect()->route('doctors.index')->with('success','Doctor created successfully');
    }


    public function show($id){
        $doctor = DB::table('doctors')->where('id',$id)->first();
        return view('pages.doctors.show',compact('doctor'));
    }

    public function edit($id){
        // $doctor = DB::table('doctors')->where('id',$id)->first();
        // return view('pages.doctors.edit', compact('doctor'));

        $doctor = \App\Models\Doctor::findOrFail($id);
        return view('pages.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone' => 'required',
            'doctor_email' => 'required|email',
            'address' => 'required',
            'sip' => 'required',
        ]);

        $doctor = Doctor::find($id);
            $doctor -> doctor_name = $request->doctor_name;
            $doctor -> doctor_specialist = $request->doctor_specialist;
            $doctor -> doctor_phone = $request->doctor_phone;
            $doctor -> doctor_email = $request->doctor_email;
            $doctor -> address= $request->address;
            $doctor -> sip = $request->sip;
            // 'password' => isset($request->password) ? Hash::make($request->password) : null,
            $doctor->save();


        return redirect()->route('doctors.index')->with('success','Doctor created successfully');
  
    }

    public function destroy($id) {
        DB::table('doctors')->where('id', $id)->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
