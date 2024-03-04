<?php

namespace App\Http\Controllers;

use stdClass;
use App\Mail\FeedbackMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendController extends Controller
{
    public function send(Request $request)
    {
        function json(array $data)
        {
            header('Content-Type: application/json');
            echo json_encode($data);
        }

        $from    = "xain3000@gmail.com";
        $to      = "xain3000@gmail.com";
        $subject = 'Новая заявка с сайта ретритного центра';
        $message = 'Имя:' . $request->name . "\nТелефон" . $request->id;

        redirect()->route('index')->with('success', 'Заявка отправлена');

        $data = new stdClass();
        $data->name = $request->name;
        $data->email = 'rc.finish7@gmail.com';
        $data->phone = $request->id;

        Mail::to($data->email)->send(new FeedbackMailer($data));

        return json([
            'result'   => 'success',
        ]);
    }
}
