<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuardRequest;
use App\Models\Client;
use App\Models\Guard;
use App\Models\Licence;
use App\Models\Monitor;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class GuardController extends Controller {

    public function index() {

        $licence = Client::query()->findOrFail(auth()->guard('client')->id())->licence;

        $client = auth()->guard('client')->user();

        $monitor = Monitor::query()->where('client_id', $client->id);

        $token = $client->createToken('TokenForNaeim')->accessToken;

        $count = $monitor->count();
        if ($count == 0) {
            return view('guards.index-first', compact('licence', 'count'));
        }

        return view('guards.index', compact('licence', 'count', 'token'));
    }

    public function create() {

        $licence = Client::query()->findOrFail(auth()->guard('client')->id())->licence;

        $client_id = auth()->guard('client')->user()->id;

        $monitor = Monitor::query()->where('client_id', $client_id);

        if ($monitor->count() >= $licence->website) {
            return redirect()->route('guard.index');
        }

        return view('guards.create');
    }

    public function store(Request $request) {
        Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'destination' => ['required', 'string'],
        ], [
            'name.required' => "نام نگهبان الزامی است",
            'destination.required' => "آدرس نگهبان الزامی است",
        ])->validate();

        $client_id = auth()->guard('client')->user()->id;

        if (Monitor::query()->where('client_id', $client_id)->where('destination', $request->destination)->count() > 0)
            throw ValidationException::withMessages(['destination' => 'آدرس نگهبان  نمی تواند تکراری باشد']);

        if ($request->is_ping == 1) {
            $type = 0;
        } else {
            $type = $request->request_type;
        }

        Monitor::query()->create([
            'name' => $request->name,
            'destination' => $request->destination,
            'port' => $request->port ?? '',
            'type' => $type,
            'client_id' => $client_id,
            'link' => $this->generateRandomString(15),
        ]);

        return redirect()->route('guard.index');
    }

    public function show($id = false) {

        $monitor_id = "";
        $is_guest = false;

        if (is_numeric($id)) {
            $monitor = Monitor::query()->findOrFail($id);
            $monitor_id = $monitor->id;
        } else {
            $monitor = Monitor::query()->where('link', $id)->firstOrFail();

            $monitor_id = $monitor->id;

            if ($monitor->is_locked && !auth()->guard('client')->check()) {

                $unlock = Session::get('unlock');
                if ($unlock != $monitor_id) {
                    return view('guards.locked', compact('id', 'monitor_id'));
                }
            }

            $is_guest = true;
        }

        try {

            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', config('constants.NODE_API') . '/monitor/' . $monitor_id);

            if ($response->getStatusCode() == 200) {
                $body = $response->getBody()->getContents();

                return view('guards.show', compact('body', 'monitor', 'is_guest'));
            }

        } catch(RequestException $e) {
            die(json_encode($e->getMessage()));
        }

        return view('guards.locked', compact('id', 'monitor_id'));
    }

    public function destroy($id) {
        $client_id = auth()->guard('client')->user()->id;

        $monitor = Monitor::query()->findOrFail($id);
        if ($monitor->client_id != $client_id)
            throw ValidationException::withMessages(['id' => 'شما دسترسی به این نگهبان را ندارید!']);

        $monitor->delete();

        return redirect()->route('guard.index');
    }

    public function unlock(Request $request) {
        Validator::make($request->all(), [
            'password' => ['required', 'string'],
            'guard_id' => ['required', 'exists:monitors,id'],
        ])->validate();

        $monitor = Monitor::query()->findOrFail($request->guard_id);

        if (password_verify($request->password, $monitor->password)) {

            Session::put('unlock', $monitor->id);

            return redirect()->route('guard', $monitor->link);
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

    public function remove_password($monitor_id = false) {
        if (!$monitor_id)
            return;

        $monitor = Monitor::query()->findOrFail($monitor_id);
        if (auth()->guard('client')->user()->id !== $monitor->client_id) {
            return;
        }
        $monitor->password = null;
        $monitor->is_locked = false;
        $monitor->save();

        return redirect(url()->previous());
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
