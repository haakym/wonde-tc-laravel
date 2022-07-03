<?php

namespace App\Http\Controllers;

use App\Services\ClassFetcherService;

class ClassController
{
    public function show(ClassFetcherService $classFetcherService, string $name)
    {
        $class = $classFetcherService->getClassByName($name);

        // dd($class->current()->lessons->data);

        return view('class.show', compact('class'));
    }
}
