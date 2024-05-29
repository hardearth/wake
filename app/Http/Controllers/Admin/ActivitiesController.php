<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Activity;
use App\Models\ActivityCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivitiesController extends Controller
{
    public function index()
    {
        $activities = Activity::paginate();

        return view('admin.activity.index', compact('activities'));
    }

    public function create()
    {
        $categories = ActivityCategory::all()->pluck('name', 'id');
        $presenters = User::all()->pluck('name', 'id');
        return view('admin.activity.create', compact('categories', 'presenters'));
    }

    public function store(Request $request, Activity $activity)
    {
        // Validar la solicitud
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'description' => 'required|string',
            'date' => 'required',
            'banner_image' => 'nullable|image',
            'featured_image' => 'nullable|image',
            'activity_categories_id' => 'required',
            'users_id' => 'required|exists:users,id',
            'presenters' => 'required'
        ]);

        if (!isset($activity->id) && !$activity->id) {
            // Crear una nueva instancia del modelo Event
            $activity = new Activity();
            $activity->users_id = auth()->id();
            $activity->created_users_id = auth()->id();
        }

        // Asignar los valores del formulario a las propiedades del modelo
        $activity->fill($request->all());

        // Almacenar las imágenes si se han proporcionado
        if ($request->hasFile('banner_image')) {
            $path = $request->file('banner_image')->store('public/images');
            $activity->banner_image = basename($path);
        }

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('public/images');
            $activity->featured_image = basename($path);
        }
        $activity->presenters_id=$request->presenters;
        // Guardar el modelo en la base de datos
        $activity->save();

        flash()->addSuccess(__('Evento creado'));
        // Redirigir a la página de detalles del evento recién creado
        return redirect()
            ->route('admin.activities.edit', $activity);
    }

    public function edit(Activity $activity)
    {
        $categories = ActivityCategory::all()->pluck('name', 'id');
        $presenters = User::all()->pluck('name', 'id');
        return view('admin.activity.edit', compact('categories', 'presenters', 'activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $activity->update($request->all());

        return redirect()->route('admin.activity.show', $activity);
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('admin.activity.index');
    }
}
