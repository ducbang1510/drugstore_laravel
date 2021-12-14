<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCountryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function listCountries()
    {
        $countries = Country::orderBy('country_id')->paginate(10);
        return view('admin.list_countries', compact(['countries']));
    }

    public function addCountryPage()
    {
        return view('admin.add_country');
    }

    public function addCountry(Request $request)
    {
        $messages = [
            'country_name.required' => 'Bạn phải nhập tên xuất xứ !',
        ];

        $validator = Validator::make($request->all(), [
            'country_name' => 'required',
        ], $messages)->validate();

        $country_add = Country::create([
            'country_name' => $request->country_name,
        ]);

        $countries = Country::orderBy('country_id')->paginate(10);
        return view('admin.list_countries', compact(['countries']));
    }

    public function editCountryPage($id)
    {
        $country = Country::where('country_id', $id)->first();
        return view('admin.edit_country', compact(['country']));
    }

    public function editCountry($id, Request $request)
    {
        $messages = [
            'country_name.required' => 'Bạn phải nhập tên xuất xứ !',
        ];

        $validator = Validator::make($request->all(), [
            'country_name' => 'required',
        ], $messages)->validate();

        $country_edit = Country::where('country_id', $id)->update([
            'country_name' => $request->country_name,
        ]);

        $country = Country::where('country_id', $id)->first();
        return view('admin.edit_country', compact(['country']));
    }
}
