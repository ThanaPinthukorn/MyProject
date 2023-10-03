<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Form7p;
use App\Models\Form7p_Appearance;
use App\Models\Form7p_Color;
use App\Models\Form7p_Overall;
use App\Models\Form7p_Smell;
use App\Models\Form7p_Taste;
use App\Models\Form7p_Texture;

use App\Models\Formpm;
use App\Models\Formpm_Color;
use App\Models\Formpm_Mellowness;
use App\Models\Formpm_Overall;
use App\Models\Formpm_Resolution;
use App\Models\Formpm_Salty;
use App\Models\Formpm_Smell;
use App\Models\Formpm_Spicy;
use App\Models\Formpm_Sweet;
use App\Models\Formpm_Viscosity;

use Illuminate\Http\Request;

class CompanyCRUDController extends Controller
{
    // สร้าง index
    public function index() {
        $companies = Form7p_Appearance::orderBy('id','asc')->paginate(10);
       // dd($companies);
        return view('companies.index', compact('companies'));
    }

    public function index2() {
        $companies = Form7p_Appearance::orderBy('id','asc')->paginate(10);
       // dd($companies);
        return view('companies.index2', compact('companies'));
    }

    // เพิ่มข้อมูล
    public function create() {
        return view('companies.create');
    }

    // ร้านค้า
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        $company = new Company; // เพื่อใหม่
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();
        return redirect()->route('companies.index')->with('success', 'Company has been created successfully.');
    }


    public function edit($id)
    {
        $form7p_appearance = Form7p_Appearance::findOrFail($id);
        return view('companies.edit', compact('form7p_appearance'));
    }

    public function update(Request $request) {

        $request->validate([
            'no_form' => 'required',
            'name_tester' => 'required'
        ]);

        $form7p_appearance = Form7p_Appearance::find($request->id); // ค้นหา id เพื่ออัปเดต
        $form7p_appearance->no_form = $request->no_form;
        $form7p_appearance->name_tester = $request->name_tester;
        $form7p_appearance->save();
        
        return redirect()->route('companies.index')->with('success', 'Company has been updated successfully.');
    }

    public function destroy(Form7p_Appearance $form7p_appearance) {
        $form_appearance->delete();
        return redirect()->route('companies.index')->with('success', 'Company has been deleted successfully.');
    }



    public function editform1(Company $company) {
        return view('companies.editform1', compact('company'));
    }
    public function form1(Request $request) {
        $request->validate([
            'no_form' => 'required',
            'product_name' => 'required',
            'tester_no' => 'required',
            'sample_no' => 'required'
        ]);

        $company = new Form7p; // เพื่อใหม่
        $company->no_form = $request->no_form;
        $company->product_name = $request->product_name;
        $company->tester_no = $request->tester_no;
        $company->sample_no = $request->sample_no;
        $company->save();
        if($request->sample_no == 2){
            return redirect()->route('form1.form7p2')->with('no_form', $request->no_form);
        }else if($request->sample_no == 3){
            return redirect()->route('form1.form7p3')->with('no_form', $request->no_form);
        }else if($request->sample_no == 4){
            return redirect()->route('form1.form7p4')->with('no_form', $request->no_form);
        }else if($request->sample_no == 5){
            return redirect()->route('form1.form7p5')->with('no_form', $request->no_form);
        }else{
            return redirect()->route('form1.form7p6')->with('no_form', $request->no_form);
        }
    }
    public function form7p2(Request $request) {
        $no_form = $request->no_form;
        return view('form1.form7p2', compact('no_form'));
    }
    public function form7p3(Request $request) {
        $no_form = $request->no_form;
        return view('form1.form7p3', compact('no_form'));
    }
    public function form7p4(Request $request) {
        $no_form = $request->no_form;
        return view('form1.form7p4', compact('no_form'));
    }
    public function form7p5(Request $request) {
        $no_form = $request->no_form;
        return view('form1.form7p5', compact('no_form'));
    }
    public function form7p6(Request $request) {
        $no_form = $request->no_form;
        return view('form1.form7p6', compact('no_form'));
    }

    public function thanks() {
        return view('companies.thanks');
    }

    public function store1(Request $request)
    {
        $company = new Form7p_Appearance;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->sample_1a = $request->input('sample_1a');
        $company->sample_2a = $request->input('sample_2a');
        $company->sample_3a = $request->input('sample_3a');
        $company->sample_4a = $request->input('sample_4a');
        $company->sample_5a = $request->input('sample_5a');
        $company->sample_6a = $request->input('sample_6a');
        $company->save();

        $company = new Form7p_Color;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->sample_1c = $request->input('sample_1c');
        $company->sample_2c = $request->input('sample_2c');
        $company->sample_3c = $request->input('sample_3c');
        $company->sample_4c = $request->input('sample_4c');
        $company->sample_5c = $request->input('sample_5c');
        $company->sample_6c = $request->input('sample_6c');
        $company->save();

        $company = new Form7p_Overall;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->sample_1o = $request->input('sample_1o');
        $company->sample_2o = $request->input('sample_2o');
        $company->sample_3o = $request->input('sample_3o');
        $company->sample_4o = $request->input('sample_4o');
        $company->sample_5o = $request->input('sample_5o');
        $company->sample_6o = $request->input('sample_6o');
        $company->save();

        $company = new Form7p_Smell;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->sample_1s = $request->input('sample_1s');
        $company->sample_2s = $request->input('sample_2s');
        $company->sample_3s = $request->input('sample_3s');
        $company->sample_4s = $request->input('sample_4s');
        $company->sample_5s = $request->input('sample_5s');
        $company->sample_6s = $request->input('sample_6s');
        $company->save();

        $company = new Form7p_Taste;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->sample_1ta = $request->input('sample_1ta');
        $company->sample_2ta = $request->input('sample_2ta');
        $company->sample_3ta = $request->input('sample_3ta');
        $company->sample_4ta = $request->input('sample_4ta');
        $company->sample_5ta = $request->input('sample_5ta');
        $company->sample_6ta = $request->input('sample_6ta');
        $company->save();

        $company = new Form7p_Texture;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->sample_1t = $request->input('sample_1t');
        $company->sample_2t = $request->input('sample_2t');
        $company->sample_3t = $request->input('sample_3t');
        $company->sample_4t = $request->input('sample_4t');
        $company->sample_5t = $request->input('sample_5t');
        $company->sample_6t = $request->input('sample_6t');
        $company->save();

        // สามารถเพิ่มโค้ดเพิ่มเติมได้ตามความต้องการ

        return redirect()->route('companies.thanks')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }


    public function editform2(Company $company) {
        return view('companies.editform2', compact('company'));
    }

    public function form2(Request $request) {
        $request->validate([
            'no_form' => 'required',
            'product_name' => 'required',
            'detailed' => 'required',
            'tester_no' => 'required',
            'sample_no' => 'required'
        ]);

        $company = new Formpm; // เพื่อใหม่
        $company->no_form = $request->no_form;
        $company->product_name = $request->product_name;
        $company->detailed = $request->detailed;
        $company->tester_no = $request->tester_no;
        $company->sample_no = $request->sample_no;
        $company->save();
        if($request->sample_no == 2){
            return redirect()->route('form2.formpm2')->with('no_form', $request->no_form);
        }else if($request->sample_no == 3){
            return redirect()->route('form2.formpm3')->with('no_form', $request->no_form);
        }else if($request->sample_no == 4){
            return redirect()->route('form2.formpm4')->with('no_form', $request->no_form);
        }else if($request->sample_no == 5){
            return redirect()->route('form2.formpm5')->with('no_form', $request->no_form);
        }else{
            return redirect()->route('form2.formpm6')->with('no_form', $request->no_form);
        }
    }
    public function formpm2(Request $request) {
        $no_form = $request->no_form;
        return view('form2.formpm2', compact('no_form'));
    }
    public function formpm3(Request $request) {
        $no_form = $request->no_form;
        return view('form2.formpm3', compact('no_form'));
    }
    public function formpm4(Request $request) {
        $no_form = $request->no_form;
        return view('form2.formpm4', compact('no_form'));
    }
    public function formpm5(Request $request) {
        $no_form = $request->no_form;
        return view('form2.formpm5', compact('no_form'));
    }
    public function formpm6(Request $request) {
        $no_form = $request->no_form;
        return view('form2.formpm6', compact('no_form'));
    }

    public function store2(Request $request)
    {
        $company = new Formpm_Color;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->csample_1 = $request->input('csample_1');
        $company->csample_2 = $request->input('csample_2');
        $company->csample_3 = $request->input('csample_3');
        $company->csample_4 = $request->input('csample_4');
        $company->csample_5 = $request->input('csample_5');
        $company->csample_6 = $request->input('csample_6');
        $company->save();

        $company = new Formpm_Mellowness;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->msample_1 = $request->input('msample_1');
        $company->msample_2 = $request->input('msample_2');
        $company->msample_3 = $request->input('msample_3');
        $company->msample_4 = $request->input('msample_4');
        $company->msample_5 = $request->input('msample_5');
        $company->msample_6 = $request->input('msample_6');
        $company->save();

        $company = new Formpm_Overall;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->osample_1 = $request->input('osample_1');
        $company->osample_2 = $request->input('osample_2');
        $company->osample_3 = $request->input('osample_3');
        $company->osample_4 = $request->input('osample_4');
        $company->osample_5 = $request->input('osample_5');
        $company->osample_6 = $request->input('osample_6');
        $company->save();

        $company = new Formpm_Resolution;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->rsample_1 = $request->input('rsample_1');
        $company->rsample_2 = $request->input('rsample_2');
        $company->rsample_3 = $request->input('rsample_3');
        $company->rsample_4 = $request->input('rsample_4');
        $company->rsample_5 = $request->input('rsample_5');
        $company->rsample_6 = $request->input('rsample_6');
        $company->save();

        $company = new Formpm_Salty;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->ssample_1 = $request->input('ssample_1');
        $company->ssample_2 = $request->input('ssample_2');
        $company->ssample_3 = $request->input('ssample_3');
        $company->ssample_4 = $request->input('ssample_4');
        $company->ssample_5 = $request->input('ssample_5');
        $company->ssample_6 = $request->input('ssample_6');
        $company->save();

        $company = new Formpm_Smell;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->smsample_1 = $request->input('smsample_1');
        $company->smsample_2 = $request->input('smsample_2');
        $company->smsample_3 = $request->input('smsample_3');
        $company->smsample_4 = $request->input('smsample_4');
        $company->smsample_5 = $request->input('smsample_5');
        $company->smsample_6 = $request->input('smsample_6');
        $company->save();

        $company = new Formpm_Spicy;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->spsample_1 = $request->input('spsample_1');
        $company->spsample_2 = $request->input('spsample_2');
        $company->spsample_3 = $request->input('spsample_3');
        $company->spsample_4 = $request->input('spsample_4');
        $company->spsample_5 = $request->input('spsample_5');
        $company->spsample_6 = $request->input('spsample_6');
        $company->save();

        $company = new Formpm_Sweet;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->swsample_1 = $request->input('swsample_1');
        $company->swsample_2 = $request->input('swsample_2');
        $company->swsample_3 = $request->input('swsample_3');
        $company->swsample_4 = $request->input('swsample_4');
        $company->swsample_5 = $request->input('swsample_5');
        $company->swsample_6 = $request->input('swsample_6');
        $company->save();

        $company = new Formpm_Viscosity;
        $company->no_form = $request->input('no_form');
        $company->no_tester = $request->input('no_tester');
        $company->name_tester = $request->input('name_tester');
        $company->vsample_1 = $request->input('vsample_1');
        $company->vsample_2 = $request->input('vsample_2');
        $company->vsample_3 = $request->input('vsample_3');
        $company->vsample_4 = $request->input('vsample_4');
        $company->vsample_5 = $request->input('vsample_5');
        $company->vsample_6 = $request->input('vsample_6');
        $company->save();

        // สามารถเพิ่มโค้ดเพิ่มเติมได้ตามความต้องการ

        return redirect()->route('companies.thanks')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
}
