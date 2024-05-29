<?php

namespace App\Http\Controllers;

use App\Mail\Events\EventRegisterMail;
use App\Models\Activity;
use App\Models\ActivityRegister;
use App\Models\Category;
use App\Models\Country;
use App\Models\Course;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserTeacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $teachers = User::all()->random()->limit(3);
        $courses = Course::all()->random()->limit(10)->get();
        $dates = Carbon::now();
        $eventsReg = ActivityRegister::where('user_id', Auth::id())->get();

        $events = Activity::whereBetween('date', [
            $dates->format('Y-m-d'),
            $dates->addDays(10)->format('Y-m-d')
        ])->whereNotIn('id', $eventsReg->pluck('activity_id'))->limit(5)->get();


        if (\Auth::user()->roles_id == 1) {
            return redirect()->route('admin.dashboard');
        }
        return view('user.home', compact('categories', 'teachers', 'courses', 'events', 'eventsReg'));
    }

    /**
     * Detalle de un curso
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function course($slug)
    {
        $course = Course::where('slug', $slug)->first();

        if ($course) {
            return view('user.course', compact('course'));
        }

        return redirect()->back();
    }

    /**
     * Vista con la administracion del perfil
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function profile()
    {
        $teacher = Auth::user()->teacher;
        $countries = Country::orderBy('name')->get()->pluck('name', 'id');
        $prefix = Country::groupBy('phone')->orderBy('phone')->get()->pluck('phone', 'id');
        $languages = config('options.language');
        $detail = Auth::user()->detail;
        return view('user.profile', compact('teacher', 'prefix', 'countries', 'languages', 'detail'));
    }

    /**
     * Actualizar los datos como usuario
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profileUpdate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'birth_date' => 'required',
            'countries_id' => 'required',
            'phone_prefix' => 'required',
            'phone_number' => 'required',
            'about_me' => 'nullable',
            'languages' => 'nullable',
            'web' => 'nullable|url',
        ]);

        $teacher = UserDetail::firstOrNew(['users_id' => Auth::id()]);
        $teacher->fill($request->all());
        $teacher->users_id = Auth::id();
        if ($teacher->save()) {
            flash()->addSuccess(__('Actualizado'));
        }
        return redirect()->back();
    }

    /**
     * Actualizar los datos de profesor
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profileUpdateTeacher(Request $request)
    {

//        $validated = $request->validate([
//            'career'    => 'nullable',
//            'facebook'  => 'nullable|url',
//            'twitter'   => 'nullable|url',
//            'instagram' => 'nullable|url',
//            'linkedin'  => 'nullable|url',
//            'tiktok'    => 'nullable|url',
//        ]);

        $teacher = UserTeacher::firstOrNew(['users_id' => Auth::id()]);
        $teacher->fill($request->all());
        $teacher->users_id = Auth::id();
        if ($teacher->save()) {
            flash()->addSuccess(__('Actualizado'));
        }
        return redirect()->back();
    }

    /**
     * Actualización de redes sociales
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profileUpdateSocials(Request $request)
    {
//        $validated = $request->validate([
//            'facebook'  => 'nullable|url',
//            'twitter'   => 'nullable|url',
//            'instagram' => 'nullable|url',
//            'linkedin'  => 'nullable|url',
//        ]);

        $teacher = UserDetail::firstOrNew(['users_id' => Auth::id()]);
        $teacher->fill($request->all());
        $teacher->users_id = Auth::id();
        if ($teacher->save()) {
            flash()->addSuccess(__('Actualizado'));
        }
        return redirect()->back();
    }

    /**
     * Actualizar clave
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function passwordUpdate(Request $request)
    {
        $validated = $request->validate([
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            flash()->addSuccess(__('Clave actualizada'));
        }
        return redirect()->back();
    }

    /**
     * Cambiar imagen de perfil
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profileUpdateImage(Request $request)
    {
        $validated = $request->validate([
            'img' => 'required|image',
        ]);

        $detail = UserDetail::firstOrNew(['users_id' => Auth::id()]);
        $ext = $request->file('img')->getClientOriginalExtension();
        $name = md5($detail . date('YmdHis')) . '.' . $ext;
        $detail->img_profile = $name;
        $detail->users_id = Auth::id();
        if ($detail->save()) {

            $image = $request->file('img');
            $filePath = 'public/profile';
            $img = Image::make($image->getRealPath());
            if (!file_exists(Storage::path($filePath))) {
                mkdir(Storage::path($filePath), 666, true);
            }
            $img->resize(500, null, function ($const) {
                $const->aspectRatio();
                $const->upsize();
            })->save(Storage::path($filePath) . '/' . $name);
            flash()->addSuccess(__('Imagen actualizada'));
        }
        return redirect()->back();

    }

    /**
     * Eliminar imagen de perfil
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profileRemoveImage()
    {
        $detail = Auth::user()->detail;
        $detail->img_profile = null;
        if ($detail->save()) {
            flash()->addSuccess(__('Imagen actualizada'));
        }
        return redirect()->back();

    }

    public function registerActivity(Activity $activity)
    {

        $register = ActivityRegister::where([
            'user_id' => Auth::id(),
            'activity_id' => $activity->id
        ])->first();

        if (!$register) {
            $register = new ActivityRegister();
            $register->activity_id = $activity->id;
            $register->user_id = Auth::id();
            if ($register->save()) {
                Mail::to(Auth::user()->email)->send(new EventRegisterMail($register));
                flash()->addSuccess(__('Inscripción realizada'));
            }
        } else {
            flash()->addInfo(__('Ya se encuentra registrado'));
        }
        return redirect()->back();
    }

    /**
     * Afiliados
     * @return void
     */
    public function affiliates()
    {
        $referred = User::where('referred_user_id', Auth::id())->paginate();
        return view('user.affiliates', compact('referred'));
    }

    /**
     * Gestión de ventas y Pagos Recibidos
     * @return void
     */
    public function sales()
    {
        $user=Auth::user();
        return view('user.sales',compact('user'));
    }

    /**
     * Mercado de Afiliación.
     * @return void
     */
    public function markets()
    {
        $courses = Course::limit(5)->get();
        return view('user.markets', compact('courses'));
    }

    /**
     * Asociar Wallet
     * @return void
     */
    public function addWallet()
    {
        return view('user.add-wallet');
    }

    /**
     * Compras
     * @return void
     */
    public function shopping()
    {
        $bills=Auth::user()->bills()->paginate();
        return view('user.shopping',compact('bills'));
    }

}
