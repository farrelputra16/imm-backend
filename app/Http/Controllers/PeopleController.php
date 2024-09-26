<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PeopleController extends Controller
{
    /**
     * Display a listing of the people.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all people records
        $people = People::all();
        return view('people.index', compact('people'));
    }

    /**
     * Show the form for creating new people.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Show form to create new people
        return view('people.create');
    }

    /**
     * Store a newly created person in storage along with a corresponding user record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input data for both People and User
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:mentor,pekerja,konsultan',
            'primary_job_title' => 'required|string|max:255',
            'primary_organization' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'regions' => 'required|string|max:255',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'linkedin_link' => 'nullable|url',
            'description' => 'nullable|string',
            'phone_number' => 'required|string|max:15',
            'gmail' => 'required|email|max:255|unique:users,email', // Unique email validation for users table

            // Additional user fields
            'password' => 'required|string|min:6',
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
        ]);

        // Create a new User with role set to 'PEOPLE'
        $user = User::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->gmail, // Use gmail for user email
            'password' => Hash::make($request->password), // Hash the password
            'role' => 'PEOPLE', // Set role as 'PEOPLE'
        ]);

        // Create a new People record and associate it with the User
        People::create([
            'user_id' => $user->id, // Associate user with people
            'name' => $validatedData['name'],
            'role' => $validatedData['role'],
            'primary_job_title' => $validatedData['primary_job_title'],
            'primary_organization' => $validatedData['primary_organization'],
            'location' => $validatedData['location'],
            'regions' => $validatedData['regions'],
            'gender' => $validatedData['gender'],
            'linkedin_link' => $validatedData['linkedin_link'],
            'description' => $validatedData['description'],
            'phone_number' => $validatedData['phone_number'],
            'gmail' => $validatedData['gmail'],
        ]);

        // Redirect to the people index with a success message
        return redirect()->route('people.index')->with('success', 'People and user created successfully.');
    }

    /**
     * Show the form for editing the specified person.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the specific person by id
        $people = People::findOrFail($id);
        return view('people.edit', compact('people'));
    }

    /**
     * Update the specified person and associated user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate both People and User data for updating
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:mentor,pekerja,konsultan',
            'primary_job_title' => 'required|string|max:255',
            'primary_organization' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'regions' => 'required|string|max:255',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'linkedin_link' => 'nullable|url',
            'description' => 'nullable|string',
            'phone_number' => 'required|string|max:15',
            'gmail' => 'required|email|max:255|unique:users,email,' . $id,

            // Additional user fields
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
        ]);

        // Find the People record by id
        $people = People::findOrFail($id);

        // Find the associated User and update user data
        $user = $people->user;
        if ($user) {
            $user->update([
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'email' => $request->gmail, // Update email
                'password' => $request->password ? Hash::make($request->password) : $user->password, // Update password if provided
                'role' => 'PEOPLE', // Ensure the role remains 'PEOPLE'
            ]);
        }

        // Update the People record
        $people->update([
            'name' => $validatedData['name'],
            'role' => $validatedData['role'],
            'primary_job_title' => $validatedData['primary_job_title'],
            'primary_organization' => $validatedData['primary_organization'],
            'location' => $validatedData['location'],
            'regions' => $validatedData['regions'],
            'gender' => $validatedData['gender'],
            'linkedin_link' => $validatedData['linkedin_link'],
            'description' => $validatedData['description'],
            'phone_number' => $validatedData['phone_number'],
            'gmail' => $validatedData['gmail'],
        ]);

        // Redirect to the people index with a success message
        return redirect()->route('people.index')->with('success', 'People and user updated successfully.');
    }

    /**
     * Remove the specified person from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the People record
        $people = People::findOrFail($id);

        // Also find the associated User and delete both
        $user = $people->user;
        if ($user) {
            $user->delete(); // Delete associated user
        }

        $people->delete(); // Delete the person

        // Redirect to the people index with a success message
        return redirect()->route('people.index')->with('success', 'People and associated user deleted successfully.');
    }
}
