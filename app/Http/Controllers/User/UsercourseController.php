<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Feature\Course;
use App\Models\Feature\CourseDetail;
use App\Models\Feature\UserCourse;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class UsercourseController extends Controller
{
    protected $userCourse,$courseDetail;
    public function __construct(UserCourse $userCourse,CourseDetail $courseDetail)
    {
        $this->userCourse = new BaseRepository($userCourse);
        $this->courseDetail = new BaseRepository($courseDetail);
    }

    public function index()
    {
        try {
            $data['userCourse'] = $this->userCourse->Query()->where('user_id',auth()->user()->id)->get();
            return view('user.course.index',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function learn($id, $progress)
{
    try {
        $userCourse = $this->userCourse->find($id);

        if (!$userCourse) {
            abort(404, 'User course not found');
        }

        $current_course = $this->courseDetail
            ->Query()
            ->where('course_id', $userCourse->course_id)
            ->where('number', $progress)
            ->first();

        if (!$current_course) {
            abort(404, 'Course material not found');
        }

        // update progress jika maju
        if ($progress > $userCourse->progress && $progress <= $userCourse->course->total_item) {
            $userCourse->progress = $progress;
            $userCourse->save();
        }

        return view('user.course.learn', compact(
            'userCourse',
            'current_course'
        ));

    } catch (\Throwable $th) {
        return view('error.index', ['message' => $th->getMessage()]);
    }
}

}
