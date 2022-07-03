# Wonde Technical Solution in Laravel

Solution for following user story:

> As a Teacher I want to be able to see which students are in my class each day of the week so that I can be suitably prepared.

## Getting started

1. Run `composer install`.
2. Run `cp .env.example .env` to generate a `.env` file (please note: the composer post install may do this for you).
3. Update the values `WONDE_API_TOKEN` and `WONDE_SCHOOL_ID` in the `.env` file.
4. Run `php artisan serve` to run solution on in-built PHP server.
5. Access on [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Summary

This solution meets the user story by presenting the user with a list of available teachers. Upon selecting a teacher, the user is then able to view the teacher's classes and choose to view a class, its students and lesson information.

### Noteworthy files

The following list of files/directories contain the majority of the logic for the web-app.

- `routes\web.php`
- `app\Http\Controllers\TeacherController.php`
- `app\Http\Controllers\ClassController.php`
- `app\Services\TeacherFetcherService.php` - Service classes were used to take any non-HTTP related logic out of the controller.
- `app\Services\ClassFetcherService.php`
- `app\Providers\AppServiceProvider.php` - The Wonde API client is registered here as a singleton, in order to keep things DRY.
- `resources\views\*`

### Possible improvements

Initially I wrote this [in plain PHP (no framework)](https://github.com/haakym/wonde-tc) with the thought that it may not need all the extras that Laravel provides. Despite this initial approach, it soon got messy so I decided to reimplement it using Laravel. With some time drained with the plain PHP approach there were a few areas which I was not able to complete within a reasonable time which I have outlined in the following list.

- The solution could be written as a timetable (i.e. classes are displayed in a table with days of the week and timings of lessons), this allows the teacher to view students in their class based on the current day. This approach was my original intended solution, but I didn't see how to accomplish this without making too many API calls.
- If this web app were to use one school only (as it currently does), a Repository class could be used to make API calls, which would be registered as a singleton in the AppServiceProvider with the school set, so the school does not need to be set each time the API is called.
- API calls wrapped in a try/catch block for better error handling.
- Adding tests with mock data. And more specifically, if interfaces were added for the Service classes, unit tests could be more easily to ensure logic is executed as expected, e.g. ensure the service class is passing the correct includes and parameters when invoking the API.

## Thank you

Thank you for reviewing my solution and I look forward to potentially discussing this further!