<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeacherController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return the list of teacher
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();

        return $this->successResponse($teachers);
    }

    /**
     * Create one new teacher
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'institute_id' => 'required|min:1',
            'full_name' => 'required|max:255',
            'department_id' => 'required|min:1',
            'phone_number' => 'required|min:11|max:11',
        ];

        $this->validate($request, $rules);

        $teacher = Teacher::create($request->all());

        return $this->successResponse($teacher, Response::HTTP_CREATED);
    }

    /**
     * Obtains and show one teacher
     * @return Illuminate\Http\Response
     */
    public function show($teacher)
    {
        $teacher = Teacher::findOrFail($teacher);

        return $this->successResponse($teacher);
    }

    /**
     * Update an existing teacher
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $teacher)
    {
        
        $rules = [
            'institute_id' => 'required|min:1',
        ];

        $this->validate($request, $rules);

        $teacher = Teacher::findOrFail($teacher);
        

        $teacher->fill($request->all());

        if ($teacher->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $teacher->save();

        return $this->successResponse($teacher);
    }

    /**
     * Remove an existing teacher
     * @return Illuminate\Http\Response
     */
    public function destroy($teacher)
    {
        $teacher = Teacher::findOrFail($teacher);

        $teacher->delete();

        return $this->successResponse($teacher);
    }
}
