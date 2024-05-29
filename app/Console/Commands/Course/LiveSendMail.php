<?php

namespace App\Console\Commands\Course;

use App\Mail\Course\LiveRegisteredMail;
use App\Models\CourseLive;
use App\Models\CourseLiveRegister;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class LiveSendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'courseLive:sendMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía un correo 2 horas antes de la clase en vivo con el link de la clase.';


    public function handle()
    {

        $now = Carbon::now();
        $twoHoursBefore = Carbon::now()->subHours(2);

        $lessons = CourseLive::whereBetween('lesson_date_at', [$twoHoursBefore, $now])->pluck('id','id');
        $lessonsRegistered = CourseLiveRegister::whereIn('course_live_id',$lessons)->get();

        foreach ($lessonsRegistered as $lesson) {
            $user = $lesson->user;

            Mail::to($user->email)->send(new LiveRegisteredMail($lesson));
        }

        $this->info('Los correos de recordatorio se han enviado correctamente.');

    }
}
