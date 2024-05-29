<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Membership;
use App\Models\MembershipCourse;
use App\Models\MembershipPrice;
use Illuminate\Http\Request;
use \RealRashid\SweetAlert\Facades\Alert;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::paginate();
        return view('admin.memberships.index', compact('memberships'));
    }

    public function create(Request $request)
    {

        $validated = $request->validate([
            'name'        => 'required|min:5',
            'description' => 'string|max:200|min:10',
            'reseller'    => 'required|boolean',
            'price'       => 'required|numeric|min:1'
        ]);

        $membership = Membership::create($validated);

        if ($membership) {

            $mp = MembershipPrice::create([
                'amount'         => $request->price,
                'memberships_id' => $membership->id
            ]);
            if ($mp) {
                flash()->addSuccess('Felicidades, tu membresía está lista');
            }
        }

        return redirect()->route('admin.membership.edit', $membership->id);
    }

    public function edit(Membership $membership)
    {
        $membershipCourses = $membership->membershipCourses;
        $courses = Course::orderBy('name')->get()->pluck('name', 'id');
        return view('admin.memberships.edit', compact('membership', 'membershipCourses', 'courses'));
    }

    public function delete()
    {

    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|min:5',
            'description' => 'string|max:200|min:10',
            'reseller'    => 'required|boolean',
        ]);

        $membership = Membership::find($request->id);
        $membership->fill($request->all());
        if ($membership->save()) {
            if ($request->price != $membership->price) {
                MembershipPrice::where(['memberships_id' => $membership->id,'status'=>'A'])
                    ->update(['status' => 'I']);
                MembershipPrice::create([
                    'amount'         => $request->price,
                    'memberships_id' => $membership->id
                ]);
            }
            flash()->addSuccess('Su membresía fue actualizada');
        }


        return redirect()->back();
    }

    public function courseAdd(Request $request)
    {
        $mc = MembershipCourse::where([
            'memberships_id' => $request->memberships_id,
            'courses_id'     => $request->courses_id
        ])->first();

        if ($mc) {
            flash()->addInfo(__('El curso ya existe'));
        } else {
            $mc = new MembershipCourse();
            $mc->fill($request->all());
            if ($mc->save()) {
                flash()->addSuccess(__('Curso agregado'));
            }
        }
        return redirect()->back();
    }

    public function courseDelete(Request $request)
    {
        $mc = MembershipCourse::find($request->membership_courses_id);
        if ($mc && $mc->delete()) {
            flash()->addSuccess(__('Curso eliminado'));
        }

        return redirect()->back();
    }
}
