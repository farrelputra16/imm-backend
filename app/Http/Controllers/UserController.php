<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\People;
use App\Models\Investor; // Import model Investor

class UserController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    
    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user and create corresponding People or Investor entry if needed.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:ADMIN,USER,INVESTOR,EVENT_ORGANIZER,PEOPLE',
        ]);

        // Validate additional fields if role is USER, PEOPLE, or INVESTOR
        if (in_array($request->role, ['USER', 'PEOPLE'])) {
            $request->validate([
                'nik' => 'required',
                'negara' => 'required',
                'provinsi' => 'required',
                'alamat' => 'required',
                'telepon' => 'required',
            ]);
        }

        // Create the new user
        $user = User::create($request->all());

        // If role is PEOPLE, create a corresponding People entry
        if ($request->role == 'PEOPLE') {
            People::create([
                'name' => "{$request->nama_depan} {$request->nama_belakang}",
                'role' => 'pekerja', // Default role for People
                'primary_job_title' => 'Unknown',
                'primary_organization' => 'Unknown',
                'location' => 'Unknown',
                'regions' => 'Unknown',
                'gender' => 'other',
                'phone_number' => $request->telepon,
                'gmail' => $request->email,
                'user_id' => $user->id,
            ]);
        }

        // If role is INVESTOR, create a corresponding Investor entry
        if ($request->role == 'INVESTOR') {
            $request->validate([
                'org_name' => 'required|string|max:255',
                'number_of_contacts' => 'required|integer|min:0',
                'number_of_investments' => 'required|integer|min:0',
                'location' => 'required|string|max:255',
                'description' => 'required|string',
                'departments' => 'required|string|max:255',
            ]);

            Investor::create([
                'user_id' => $user->id,
                'org_name' => $request->org_name,
                'number_of_contacts' => $request->number_of_contacts,
                'number_of_investments' => $request->number_of_investments,
                'location' => $request->location,
                'description' => $request->description,
                'departments' => $request->departments,
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }



    /**
     * Update the specified user and People or Investor entry in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:ADMIN,USER,INVESTOR,EVENT_ORGANIZER,PEOPLE',
        ]);

        if (in_array($request->role, ['USER', 'PEOPLE', 'INVESTOR'])) {
            $request->validate([
                'nik' => 'required',
                'negara' => 'required',
                'provinsi' => 'required',
                'alamat' => 'required',
                'telepon' => 'required',
            ]);
        }

        $user = User::findOrFail($id);
        $user->update($request->all());

        if ($user->role == 'PEOPLE') {
            $people = People::where('user_id', $id)->first();

            if ($people) {
                $people->update([
                    'name' => "{$request->nama_depan} {$request->nama_belakang}",
                    'phone_number' => $request->telepon,
                    'gmail' => $request->email,
                ]);
            } else {
                People::create([
                    'user_id' => $user->id,
                    'name' => "{$request->nama_depan} {$request->nama_belakang}",
                    'role' => 'pekerja',
                    'phone_number' => $request->telepon,
                    'gmail' => $request->email,
                ]);
            }
        }

        if ($user->role == 'INVESTOR') {
            $investor = Investor::where('user_id', $id)->first();

            if ($investor) {
                $investor->update([
                    'org_name' => $request->org_name,
                    'number_of_contacts' => $request->number_of_contacts,
                    'number_of_investments' => $request->number_of_investments,
                    'location' => $request->location,
                    'description' => $request->description,
                    'departments' => $request->departments,
                ]);
            } else {
                Investor::create([
                    'user_id' => $user->id,
                    'org_name' => $request->org_name,
                    'number_of_contacts' => $request->number_of_contacts,
                    'number_of_investments' => $request->number_of_investments,
                    'location' => $request->location,
                    'description' => $request->description,
                    'departments' => $request->departments,
                ]);
            }
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
