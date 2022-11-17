<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ApiController extends Controller
{
    public function getAllStudents() {
        $students = Student::get()->toJson(JSON_PRETTY_PRINT);
        return response($students, 200);   
    }

    public function createStudent(Request $request) {
        $student = new Student;
        $student->name = $request->name;
        $student->course = $request->course;
        $student->save();
    
        return response()->json([
            "message" => "Estudante criado com sucesso!"
        ], 201);
    }

    public function getStudent($id) {
        if (Student::where('id', $id)->exists()) {
            $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
        }else {
            return response()->json([
              "message" => "Estudante não encontrado."
            ], 404);
        }
    }

    public function updateStudent($id, Request $request) {
        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->course = is_null($request->course) ? $student->course : $request->course;
            $student->update();
            return response()->json([
                "message" => "Estudante atualizado com sucesso!"
            ], 200);
        }else {
            return response()->json([
                "message" => "Estudante não encontrado."
            ], 404);
        }
    }

    public function deleteStudent ($id) {
        if(Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->delete();
    
            return response()->json([
              "message" => "Estudante removido."
            ], 200);
        }else {
            return response()->json([
              "message" => "Estudante não encontrado."
            ], 404);
        }
    }
}
