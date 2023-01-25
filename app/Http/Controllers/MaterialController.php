<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Material;
use App\Models\Unit;


class MaterialController extends Controller
{
    /** --------------- Materials data table
     * =============================================*/
    public function show()
    {
        $Materials = Material::where('status', true)->latest()->get();

        return view('inventory.Material.table')->with(compact('Materials'));
    }

    
    /** --------------- Material data table
     * =============================================*/
    public function create()
    {
        return view('inventory.Material.form');
    }



    /** --------------- Store Material
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
           
            'name'  => 'required',
            'quantity'  => 'required|integer',
            'quality'  => 'required',
            'unit'  => 'required',
            'supplier_id' => 'required'

           
        ]);

        $data = $request->all();

        $Material = Material::create($data);

        return to_route('Material')->with('success', 'Record created successfully');
    }


    
    /** --------------- Material data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $Material = Material::find($key);

        return view('inventory.Material.form')->with(compact('Material'));
    }




    /** --------------- Update Material
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
           
            'name'  => 'required',
            'quantity'  => 'required|integer',
            'quality'  => 'required',
            'unit'  => 'required',
            'supplier_id' => 'required'

           
        ]);
        
        $data = $request->all();

        $Material = Material::find($key)->update($data);

        return to_route('Material')->with('success', 'Record updated successfully');
    }



    /** --------------- Delete Material
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $Material = Material::destroy($key);

        return to_route('Material')->with('success', 'Record deleted successfully');
    }


    public function getMaterialUnit(Request $request)
    {
        $companyId = auth()->user()->company_id;
        $key = $request->key;

        $units = Unit::where('company_id', $companyId)->where('status', true)->get();
        $html = "";

        if($material = Material::find($key))
        {
            $html .= "<label>Unit*</label>
            <select name=\"unit[]\" class=\"form-control\" required>
            <option value=\"\" selected disabled>Select One</option>";

            foreach($units as $item)
            {
                if($item->id == $material->unit_id):
                $selected = "selected";
                else:
                $selected = "";
                endif;

                $html .= "<option value=\"{$item->id}\" $selected>{$item->name}</option>";
            }

            $html .= "</select>";
        }
        else
        {
            $html .= "Not Found";
        }

        return $html;
    }


    
    public function getMaterialPrice(Request $request)
    {
        $companyId = auth()->user()->company_id;
        $key = $request->key;
        $html = 0;

        if($material = Material::find($key))
        {
            $html = $material->price;
        }

        return $html;
    }
    

}
