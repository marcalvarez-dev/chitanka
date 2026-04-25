<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreateMail;

class MailController extends Controller
{
    public function index() {}
    public function mailMe()
    {
        Mail::to(Auth::user()->email)->send(new OrderCreateMail("Jose Rodriguez"));
    }
}
