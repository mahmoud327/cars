<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Office;
use App\Models\Type;

use App\DataTables\CarDataTable;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CarDataTable $type)
   {

        return $type->render('admin.cars.index');

        // return view('layouts.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [

            'type'          => 'required',
            'model'         => 'required',
            'color'         => 'required',
            'count_number'  =>'required|integer',
            'type_id'       => 'required',
            'plate'         => 'required|unique:cars,plate',
            'office_id'     =>'required',

          ];

          $messages = [
            'type.required'         => 'نوع السياره مطلوب',
            'model.required'        => 'موديل السياره مطلوب',
            'color.required'        => 'لون السياره مطلوب',
            'count_number.required' => 'عداد السياره مطلوب',
            'count_number.integer'  => '  يجب ادخال رقم للعداد',
            'type_id.required'      => ' فئة السيارة مطلوبة',
            'plate.required'        => 'رفم اللوحه مطلوب',
            'plate.unique'          => 'رقم اللوحه موجود بالفعل ',
            'office_id.required'    => 'اسم المكتب مطلوب',

          ];

          $this->validate($request, $rules, $messages);

          $record = Car::create($request->all());

          flash()->success("تم إضافة سيارة بنجاح");

          return redirect(route('cars.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Car::findOrFail($id);
        $office=Office::pluck('name','id');

        $selectedid=$model->office_id;
        return view('admin.cars.edit', compact('model','office','selectedid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'type' => 'required',
            'model' => 'required',
            'color' => 'required',
            'count_number'=>'required|integer',
            'Class' => 'required',
            'plate' => 'required|unique:drivers,plate,'.$id,
            'office_id'=>'required',

        ];
        $messages = [
            'type.required' => 'نوع السياره مطلوب',
            'model.required' => 'موديل السياره مطلوب',
            'color.required' => 'لون السياره مطلوب',
            'count_number.required' => 'عداد السياره مطلوب',
            'count_number.integer' => '  يجب ادخال رقم للعداد',
            'Class.required' => ' الفئه سيارة مطلوب',
            'plate.required' => 'رفم اللوحه مطلوب',
            'plate.unique' => 'رقم اللوحه موجود بالفعل ',
            'office_id.required' => 'اسم المكتب مطلوب',


          ];
        $this->validate($request, $rules, $messages);

        $record = Car::findOrFail($id);
        $record->update($request->all());
        flash()->success("تم التعديل بنجاح");
        return redirect(route('cars.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $record = Car::findOrFail($request->drive_id);
        $record->delete();
        flash()->success("تم الحذف بنجاح");
        return back();
    }
    public function multi_delete() {
		if (is_array(request('item'))) {
			Car::destroy(request('item'));
		} else {
			Car::find(request('item'))->delete();
		}
		session()->flash('success','تم الحذف بنجاح');
		return redirect()->back();
	}

    public function activate($id)
    {
        $user = Car::findOrFail($id);
        $user->activate = 1;
        $user->save();

        flash()->success('تم التفعيل');
        return back();
    }
    public function deactivate($id)
    {
        $user = Car::findOrFail($id);
        $user->activate = 0;
        $user->save();

        flash()->success('تم إلغاء التفعيل');
        return back();
    }
}
