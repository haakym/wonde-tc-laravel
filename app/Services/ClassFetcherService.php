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
     * Get class by classes.
     * 
     * @return Wonde\ResultIterator
     */
    public function getClasses(array $includes = [], array $parameters = [])
    {
        return $this->wondeClient
                ->school(env('WONDE_SCHOOL_ID'))
                ->classes
                ->all($includes, $parameters);
    }
}
