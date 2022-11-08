<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget('course');
        $request->session()->forget('coupon_number');

        $courses = Course::get();
        return view('user.courses.index', compact('courses'));
    }

    public function detail(Course $course)
    {
        return view('user.courses.detail', compact('course'));
    }

    public function request(Course $course)
    {
        session([
            'course' => $course,
        ]);
        return view('user.courses.request', compact('course'));
    }

    public function requestDetail(Request $request, Course $course)
    {
        session([
            'coupon_number' => $request->coupon_number,
        ]);

        if ($request->session()->get('coupon_number') === '777') {
            $coupon = 1000;
        }

        $course = $request->session()->get('course');
        $request_price = (int) $course->amount - (int) $coupon;

        return view('user.courses.request_detail', compact(['course', 'coupon', 'request_price']));
    }


    public function requestFinish(Request $request)
    {
        $course = $request->session()->get('course');

        //予約作成
        $booking_id = Booking::create([
            'course_id' => $course->id,
            'user_id' => Auth::id(),
            'amount' => (int)$course->amount,
            'coupon' => (int)$request->coupon,
            'request_price' => (int)$request->request_price,
        ]);


        return redirect()->route('user.payment', ['booking_id' => $booking_id]);
    }


    public function payment(Request $request)
    {
        // dd($request->booking_id);
        $booking = Booking::findOrFail($request->booking_id);
        return view('user.courses.payment', ['booking' => $booking]);
    }

    public function paymentFinish(Request $request)
    {
        $all = $request->all();
        $secret = "sk_test_361468f0da017f40a6be2b4d";
        \Payjp\Payjp::setApiKey($secret);
        $description = 'テスト';
        //ユーザーの作成
        $customer = \Payjp\Customer::create(array('card' => $all['payjp-token'], 'description' => $description));
        //チャージの作成
        $charge = \Payjp\Charge::create(array('customer' => $customer->id, 'amount' => 5000, 'currency' => 'jpy', 'description' => $description));
        dump($charge);
    }
}
