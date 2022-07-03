<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\TeacherFetcherService;

class TeacherController extends Controller
{
    /**
     * Display list of teachers.
     *
     * @param TeacherFetcherService $teacherFetcherService
     * @return View
     */
    public function index(TeacherFetcherService $teacherFetcherService)
    {
        $result = $teacherFetcherService->getAllTeachers();

        $teachers = collect($result)->sortBy('forename')->toArray();

        return view('teachers.index', compact('teachers'));
    }

    /**
     * Display teacher details.
     *
     * @param TeacherFetcherService $teacherFetcherService
     * @param string $id
     * @return View
     */
    public function show(TeacherFetcherService $teacherFetcherService, string $id)
    {
        $teacher = $teacherFetcherService->getTeacherById($id, ['classes']);

        return view('teachers.show', compact('teacher'));
    }
}
