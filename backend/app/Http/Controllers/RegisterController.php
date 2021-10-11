<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddHomeworkRequest;
use App\Http\Requests\AddStudentRequest;
use App\Http\Requests\SubmitHomeworkRequest;
use App\Models\Comment;
use App\Models\Homework;
use App\Models\Student;
use App\Models\StudentSubject;
use App\Models\Thread;
use App\Repositories\HomeworkEloquentRepository;
use App\Repositories\StudentEloquentRepository;
use App\Repositories\StudentSubjectEloquentRepository;
use App\Repositories\ThreadEloquentRepository;
use App\Repositories\UserEloquentRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * @var UserEloquentRepository
     */
    private $user;
    /**
     * @var HomeworkEloquentRepository
     */
    private $homework;
    /**
     * @var StudentSubjectEloquentRepository
     */
    private $student_subject;
    /**
     * @var StudentEloquentRepository
     */
    private $student;
    /**
     * @var ThreadEloquentRepository
     */
    private $thread;

    public function __constructor()
    {
        $this->user = new UserEloquentRepository();
        $this->homework = new HomeworkEloquentRepository();
        $this->student_subject = new StudentSubjectEloquentRepository();
        $this->student = new StudentEloquentRepository();
        $this->thread = new ThreadEloquentRepository();
    }

    /**
     * @param AddHomeworkRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function registerHomework(AddHomeworkRequest $request)
    {
        $homework = $this->homework->createHomework($request);
        $student_ids = $this->student_subject->getStudentIdArray($request);

        foreach ($student_ids as $student_id) {
            $student = $this->student->getStudentsInAClass($request, $student_id);

            if ($student->exists()) {
                $students[] = $student->first();
            }
        }

        if ($students) {
            foreach ($students as $student) {
                $this->thread->createThread($homework, $student);
            }
        }
        return redirect(route('homework', [$request->input('classroom_id'), $request->input('subject_id')]));
    }

    /**
     * @param Thread $thread
     * @param Student $student
     * @param SubmitHomeworkRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function registerComment(Thread $thread, Student $student, SubmitHomeworkRequest $request)
    {
        $comment = Comment::create([
            'name' => $request->input('name'),
            'comment' => $request->input('comment'),
            'thread_id' => $thread->id
        ]);

        if ($request->has('image')) {
            $image_path = $request->file('image')->store('public/homework/');
            $image_name = basename($image_path);
            $comment->image = $image_name;
            $comment->save();
        }

        if ($thread->status == 1) {
            $thread->status = 2;
            $thread->save();
        }
        return redirect(route('submit-thread', [$thread->id, $student->id]));
    }

    /**
     * @param AddStudentRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function addStudent(AddStudentRequest $request)
    {
        if ($this->user->isDuplicateEmail('email', $request->input('email'))) {
            return redirect(route('add-student'))->with('flash_message_fail', 'このメールアドレスは既に利用されています。');
        }

        $this->user->createUser($request);
        $new_user = $this->user->getAUser('email', $request->input('email'));

        Student::create([
            'classroom_id' => $request->classroom,
            'user_id' => $new_user->id
        ]);

        $new_student = Student::where('user_id', $new_user->id)->first();
        $subjects = $request->input('subject');

        foreach ($subjects as $subject) {
            StudentSubject::create([
                'subject_id' => $subject,
                'student_id' => $new_student->id
            ]);
        }

        foreach ($subjects as $subject) {
            $homeworks = Homework::where([
                'classroom_id' => $request->classroom,
                'subject_id' => $subject
            ])->get();

            foreach ($homeworks as $homework) {
                Thread::create([
                    'homework_id' => $homework->id,
                    'student_id' => $new_student->id,
                    'status' => 1
                ]);
            }
        }

        return redirect('add-student')->with('flash_message_success', '生徒を追加しました。');
    }

    /**
     * @param Thread $thread
     * @param Student $student
     * @return Application|RedirectResponse|Redirector
     */
    public function acceptHomework(Thread $thread, Student $student)
    {
        $thread->status = 3;
        $thread->save();

        return redirect(route('submit-thread', [$thread->id, $student->id]));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function updateHomework(Request $request)
    {
        $homework = Homework::find($request->input('homework'));
        $homework->homework = $request->input('comment');
        $homework->name = $request->input('name');
        $homework->save();

        return redirect(route('homework', [$homework->classroom_id, $homework->subject_id]));
    }
}
