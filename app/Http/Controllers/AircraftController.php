<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aircraft;
use App\Http\Resources\AircraftResource;

class AircraftController extends Controller
{
    public function index() {

        return AircraftResource::collection(Aircraft::with('type','size')->get());

    }

    public function show( Aircraft $aircraft) {
        
        return $aircraft;

    }

    public function store(Request $request) {
        
        $aircraft = Aircraft::create($request->all());

        return response()->json($aircraft, 201);

    }

    public function update(Request $request, Aircraft $aircraft) {
        $aircraft->update($request->all());

        return response()->json($aircraft, 200);

    }

    public function destroy(Aircraft $aircraft) {
        
        $aircraft->delete();

        return response()->json(null, 204);
    }

    
    public function getQueue() {
        $aircrafts = AircraftResource::collection(Aircraft::with('type','size')->get());
        $queue = $this->arrangeQueue($aircrafts);
        return response()->json($queue);
    }

    public function arrangeQueue($queue) {
        $temp = [];

        for($x = 0; $x < count($queue); $x++) {
            /* Order aircraft by type */
            for($y = $x + 1; $y < count($queue); $y++ ){
                if($queue[$x]->type['id'] > $queue[$y]->type['id']) {
                    $temp = $queue[$x];
                    $queue[$x] = $queue[$y];
                    $queue[$y] = $temp;
                }
            }
            /* Order aircraft by size */
            for($y = $x + 1; $y < count($queue); $y++ ){
                if($queue[$x]->size['id'] < $queue[$y]->size['id'] && $queue[$x]->type['id'] == $queue[$y]->type['id'] ) {
                    $temp = $queue[$x];
                    $queue[$x] = $queue[$y];
                    $queue[$y] = $temp;
                }
            }
            /* Order aircraft by date*/
            for($y = $x + 1; $y < count($queue); $y++ ) {
                if( $queue[$x]->created_at > $queue[$y]->created_at && $queue[$x]->type['id'] == $queue[$y]->type['id'] && $queue[$x]->size['id'] == $queue[$y]->size['id'] ) {
                    $temp = $queue[$x];
                    $queue[$x] = $queue[$y];
                    $queue[$y] = $temp;
                }
            }

        }
        return $queue;
    }

    public function editAircraft($id) {
        return view('forms.aircraftform');
    }

    public function createAircraft() {
        return view('forms.aircraftform');
    }
}
