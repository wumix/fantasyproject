<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function feedback(ContactRequest $request)
    {
        $emailRecievers = [
            'umair_hamid100@yahoo.com',
            'hassan@branchezconsulting.com',
            'adeel@branchezconsulting.com'
        ];
        \Mail::send('emails.contact', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function ($message) use ($request, $emailRecievers) {
            $message->from($request->get('email'), $request->get('name'));
            $message->to($emailRecievers, 'Admin')
                ->subject('App Feedback - ' . $request->get('subject'));
        });
        return response()
            ->json(['status' => true, 'message' => "Email sent successfully."]);
    }
}
