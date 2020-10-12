<?php

namespace App\Http\Controllers;

use App\ConnectionRequests;
use App\Connections;
use App\Http\Requests\ConnectionRequestRequest;
use App\Http\Resources\ConnectionRequestCollection;
use App\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnectionRequestController extends Controller
{
    //
    public function create(ConnectionRequestRequest $request)
    {

        $connRequest = new ConnectionRequests();
        $connRequest->requestor = Auth::user()->id;
        $connRequest->requested = $request->user_id;
        try {
            $connRequest->save();
            return response()->json([
                'message' => 'Request Connection Sent',
                'data' => $connRequest
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Unable to send request',
                'data' => $ex
            ], 500);
        }
    }

    public function show()
    {
        $requests = new ConnectionRequestCollection(ConnectionRequests::whereRequested(Auth::user()->id)->whereStatus('pending')->get());
        return response()->json([
            'message' => 'Your requests',
            'data' => $requests
        ], 200);
    }

    public function accept(ConnectionRequests $request) {
        $conenction = new Connections();

        $conenction->user_1 = $request->requestor;
        $conenction->user_2 = Auth::user()->id;

        $notification = new Notifications();
        $notification->user_id =  $request->sent_by->id;
        $notification->source =  Auth::user()->id;
        $notification->message =  Auth::user()->username . ' accepted your connection request';
        $notification->type =  'connection';
        $notification->entity = 'App\Connections';
        try {
            $conenction->save();
            $notification->save();
            $request->status = 'accepted';
            $request->save();
            return response()->json([
                'message' => 'Accepted Connection Request',
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Unable to accept connection request',
                'data' => $ex
            ], 500);
        }
    }
}
