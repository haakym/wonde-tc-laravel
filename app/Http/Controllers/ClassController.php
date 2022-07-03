<?php

namespace App\Http\Controllers;

use App\Services\ClassFetcherService;

class ClassController
{
    /**
     * Show class data.
     *
     * @param ClassFetcherService $classFetcherService
     * @param string $name
     * @return View
     */
    public function show(ClassFetcherService $classFetcherService, string $name)
    {
        $class = $classFetcherService->getClasses(
                ['students', 'lessons', 'lessons.period'],
                ['class_name' => $name]
            );

        return view('class.show', compact('class'));
    }
}
