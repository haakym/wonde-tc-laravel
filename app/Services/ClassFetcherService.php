<?php

namespace App\Services;

use Wonde\Client as WondeClient;

class ClassFetcherService
{
    public function __construct(WondeClient $wondeClient)
    {
        $this->wondeClient = $wondeClient;
    }
    
    /**
     * Get class by class name with students, lessons and period.
     * 
     * @return Wonde\ResultIterator
     */
    public function getClassByName(string $name)
    {
        return $this->wondeClient
                ->school(env('WONDE_SCHOOL_ID'))
                ->classes
                ->all(
                    ['students', 'lessons', 'lessons.period'],
                    ['class_name' => $name]
                );
    }
}
