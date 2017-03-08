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
    public function index(Request $request)
    {
        return view('astroport/index', [
            'data' => [
                'occupied' => false
            ],
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['occupied'] = false;
        if (isset($data['shipName']) && !empty($data['shipName'])) {
            $data['occupied'] = true;
        }

        return view('astroport/index', [
            'data' => $data,
        ]);
    }

}