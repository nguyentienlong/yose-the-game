<?php
/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 3/7/17
 * Time: 3:23 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AstroportController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        return view('astroport/index', [
            'data' => $data,
        ]);
    }

}