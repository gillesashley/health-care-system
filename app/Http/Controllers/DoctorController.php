<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = DB::table('doctors')->select('*')->get();

        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route_name = 'admin.doctors.store';
        $route_method = 'POST';
        $doctor = new  Doctor();
        return view('admin.doctors.create', compact('route_name', 'route_method', 'doctor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        $imageName = null;

        try {
            // Retrieve the validated input data...

            // dd($request->validated());


            $request->validated();

            // $imageName = time() . '.' . request()->file('image')->getClientOriginalExtension();

            // // $request()->image->move(public_path('storage/images'), $imageName);
            // // $request()->file('image')->storeAs('images',$imageName);
            //code...
            $imageName = Storage::disk('public')->put('images', $request->file('image'));

            DB::transaction(function () use ($request, $imageName) {

                [$day, $month, $year] = explode('/', $request->validated()['dob']);

                $doctor = Doctor::create([
                    'firstname' => $request->input('firstname'),
                    'lastname' => $request->input('lastname'),
                    'username' => $request->input('username'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'dob' => "$year-$month-$day",
                    'gender' => $request->input('gender'),
                    'address' => $request->input('address'),
                    'country' => $request->input('country'),
                    'state' => $request->input('state'),
                    'city' => $request->input('city'),
                    'phone' => $request->input('phone'),
                    'image' => $imageName,
                    'short_bio' => $request->input('short_bio'),
                    'status' => $request->boolean('status'),
                ]);
            });

            return back()->with('success', 'Doctor Created!!');
        } catch (\Throwable $th) {
            if (strlen($imageName)) {
                //remove the image if the doctor could not be created

                Storage::delete("images/{$imageName}");
            }
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        $route_name = 'admin.doctors.update';
        $route_method = 'PATCH';
        return view('admin.doctors.create', compact('doctor', 'route_name', 'route_method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {

        $route_name = 'admin.doctors.update';
        $route_method = 'PATCH';
        return view('admin.doctors.create', compact('doctor', 'route_name', 'route_method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $imageName = null;

        try {
            DB::transaction(function () use ($request, $doctor) {
                $data = collect($request->validated())->except('image', 'dob');
                $doctor->update($data->toArray());

                if ($request->has('dob')) {
                    [$day, $month, $year] = explode('/', $request->validated()['dob']);
                    $doctor->update(['dob' => "$year-$month-$day"]);
                }

                if ($request->has('image')) {
                    if (Storage::disk('public')->exists($doctor->image)) {
                        Storage::disk('public')->delete($doctor->image);
                        $doctor->update(['imageName' => '']);
                    }

                    $imageName = Storage::disk('public')->put('images', $request->file('image'));
                    $doctor->update(['imageName' => $imageName]);
                }

                $doctor->refresh();

                return redirect()->route('admin.doctors.show', ['doctor' => $doctor->id])->with('success', 'Doctor Updated', 'doctor');
            });
        } catch (\Throwable $th) {
            Storage::disk('public')->delete("images/{$imageName}");
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
    }
}
