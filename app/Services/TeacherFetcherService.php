<?php

namespace App\Services;

use Wonde\Client as WondeClient;

class TeacherFetcherService
{
    public function __construct(WondeClient $wondeClient)
    {
        $this->wondeClient = $wondeClient;
    }
    
    /**
     * Get all teachers.
     * 
     * @return Wonde\ResultIterator
     */
    public function getAllTeachers(array $includes = [], array $parameters = [])
    {
        return $this->wondeClient
                ->school(env('WONDE_SCHOOL_ID'))
                ->employees
                ->all($includes, $parameters);
    }

    /**
     * Get a teacher by their id.
     * 
     * @return stdClass
     */
    public function getTeacherById(string $id, array $includes = [], array $parameters = [])
    {
        return $this->wondeClient
                ->school(env('WONDE_SCHOOL_ID'))
                ->employees
                ->get($id, $includes, $parameters);
    }
}
