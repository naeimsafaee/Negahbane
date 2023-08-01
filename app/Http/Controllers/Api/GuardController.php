<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Monitor;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class GuardController extends Controller {

    public function _index() {
        return _response(Monitor::all());
    }

    public function index(Request $request) {
        $client_id = auth()->guard('api')->user()->id;

        $monitor = Monitor::query()->where('client_id', $client_id);

        if ($request->has('search'))
            $monitor = $monitor->where('name', 'LIKE', "%$request->search%");
        $monitor = $monitor->get()->toArray();

        for($i = 0; $i < count($monitor); $i++) {
            try {

                $client = new \GuzzleHttp\Client();
                $response = $client->request('GET', config('constants.NODE_API') . '/monitor/status/' . $monitor[$i]["id"]);

                if ($response->getStatusCode() == 200) {
                    $body = $response->getBody()->getContents();

                    $monitor[$i]["info"] = json_decode($body);
                }

            } catch(RequestException $e) {
                return response()->json($e->getMessage(), 500);
                //09390980229;
            }
        }
        return _response($monitor);
    }

    public function store(Request $request) {
        Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'destination' => ['required', 'string'],
            'port' => ['string'],
            'type' => ['required', 'integer'],
            'need_redirect' => ['boolean'],
            'need_ssl' => ['boolean'],
        ])->validate();

        $client_id = auth()->guard('api')->user()->id;

        $monitor = Monitor::query()->create([
            'name' => $request->name,
            'destination' => $request->destination,
            'port' => $request->port ?? '',
            'need_redirect' => $request->need_redirect ?? false,
            'need_ssl' => $request->need_ssl ?? false,
            'type' => $request->type,
            'client_id' => $client_id,
            'link' => $this->generateRandomString(15),
        ]);

        return _response($monitor);
    }

    public function show($id) {
        $client_id = auth()->guard('api')->user()->id;

        $monitor = Monitor::query()->findOrFail($id);
        if ($monitor->client_id != $client_id)
            throw ValidationException::withMessages(['id' => 'شما دسترسی به این نگهبان را ندارید!']);

        try {

            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', config('constants.NODE_API') . '/monitor/' . $monitor->id);

            if ($response->getStatusCode() == 200) {
                $body = $response->getBody()->getContents();

                $monitor->log = json_decode($body);

                return _response($monitor);
            }

        } catch(RequestException $e) {
            die(json_encode($e->getMessage()));
        }

    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        $client_id = auth()->guard('api')->user()->id;

        $monitor = Monitor::query()->findOrFail($id);
        if ($monitor->client_id != $client_id)
            throw ValidationException::withMessages(['id' => 'شما دسترسی به این نگهبان را ندارید!']);

        $monitor->delete();

        return _response($monitor);
    }

    public function unlock(Request $request) {
        Validator::make($request->all(), [
            'password' => ['required', 'string'],
            'monitor_id' => ['required', 'exists:monitors,id'],
        ])->validate();

        $monitor = Monitor::query()->findOrFail($request->monitor_id);

        if (password_verify($request->password, $monitor->password)) {
            return _response("", "ok");
        }
        throw ValidationException::withMessages(['password' => 'اطلاعات کاربری اشتباه است.']);
    }

    public function set_password(Request $request) {

        $monitor = Monitor::query()->findOrFail($request->monitor_id);
        $monitor->password = Hash::make($request->password);
        $monitor->is_locked = true;
        $monitor->save();

        return _response("ok");
    }

    public function remove_password($monitor_id) {

        $monitor = Monitor::query()->findOrFail($monitor_id);
        if (auth()->guard('api')->user()->id !== $monitor->client_id) {
            throw ValidationException::withMessages(['monitor_id' => 'شما اجازه دسترسی به این نگهبان را ندارید']);
        }
        $monitor->password = null;
        $monitor->is_locked = false;
        $monitor->save();

        return _response("ok");
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
