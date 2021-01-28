<?php

namespace App\Http\Controllers\Front\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AskQuestion;
use App\Models\Subscriber;
use Validator;

class CommonController extends Controller
{

    public function askQuestion(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'message'       => 'required',
            'email'         => 'required|email'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return array(
                'message'   => reset($errors)[0],
                'status'   => 0
            );
        }

        $message = $request->message;
        $email = $request->email;
        AskQuestion::create([
            'message' => $message,
            'email' => $email,
        ]);

        return array(
            'message'   => "Your question has been sent successfuly.",
            'status'   => 1
        );
    }

    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'email'         => 'required|email'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return array(
                'message'   => reset($errors)[0],
                'status'   => 0
            );
        }

        $email = $request->email;
        Subscriber::create([
            'message' => $message,
            'email' => $email,
        ]);

        return array(
            'message'   => "Now you are subscribe with us.",
            'status'   => 1
        );
    }
    
}
