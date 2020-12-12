<?php

namespace App\Http\Controllers;

use App\Guest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Support\Jsonable;

class GuestsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    if ($request->search == '')
      $guests = Guest::orderBy('updated_at', 'desc')->paginate(20);
    else
      $guests = Guest::where('name', 'LIKE', '%' . $request->search . '%')
    ->orderBy('updated_at', 'desc')->paginate(20);
    foreach ($guests as $guest)
      $guest->timestamp = Carbon::parse($guest->updated_at)->isoFormat('MMMM D, YYYY - h:mma');

    if ($request->data == 'logs') {
      return response()->json([
        'guests' => $guests
      ]);
    }
    return view('logs', [
      'guests' => $guests,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('register', [
      'year' => 2020
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $guest = new Guest;

    $guest->name = strip_tags($request->name);

    $guest->save();

    return response()->json([
      'status' => 'success',
      'msg' => 'Registered Successfully'
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $guest = Guest::find($id);

    return response()->json([
      'guest' => $guest
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $guest = Guest::find($id);
    $guest->raffle = true;
    $guest->save();

    $guests = Guest::whereNull('raffle')->inRandomOrder()->limit(100)->get();
    return response()->json([
      'guests' => $guests
    ]);
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
    $guest = Guest::find($id);
    $guest->name = strip_tags($request->name);
    $guest->save();

    return response()->json([
      'status' => 'success',
      'msg' => 'Update Successful'
    ]);
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

    $guest->delete();
    return response()->json([
      'status' => 'success',
      'msg' => 'Delete Successful'
    ]);
  }
}
