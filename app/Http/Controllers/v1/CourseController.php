<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;
use App\Course;
use App\Http\Resources\v1\CourseCollection;
use App\Http\Resources\v1\CourseResource;
/**App\Http\Resources\v1
* 
*/
class CourseController extends Controller
{
	


	public function index(){
		$Courses = Course::paginate(3);
		return new CourseCollection($Courses);
	}

	public function single($course_id){
			$course = Course::findOrFail($course_id);
         return new CourseResource($course);
	}
}