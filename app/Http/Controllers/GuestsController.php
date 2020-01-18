<?php

namespace App\Http\Controllers;

use App\Guest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GuestsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $checker = Guest::all();
    $guest = new Guest;

    $guest->fill($request->only([
      'last_name',
      'first_name',
      'middle_initial',
      'college',
      'course',
      'year_level'
    ]));

    foreach ($checker as $check) {
      if (strtolower($check->last_name) == strtolower($guest->last_name)) {
        if (strtolower($check->first_name) == strtolower($guest->first_name)) {
          if (strtolower($check->middle_initial) == strtolower($guest->middle_initial)) {
	    if ($check->college == $guest->college) {
	      if (strtolower($check->course) == strtolower($guest->course)) {
		if ($check->year_level == $guest->year_level) {
	          return redirect('');
		}
	      }
	    }
	  }
        }
      }
    }

    $guest->created_at = Carbon::now('+8:00');
    $guest->updated_at = Carbon::now('+8:00');

    sleep(2);
    $guest->save();

    return redirect('');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
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
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $guest = Guest::find($id);
    if ($guest != null) {
      $guest->delete();
      return redirect('logs');
    }
  }
}
