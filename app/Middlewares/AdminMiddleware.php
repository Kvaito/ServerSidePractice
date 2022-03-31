<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class AdminMiddleware
{
    public function handle(Request $request)
    {
        //Если пользователь не администратор
        if (app()->auth::user()->id_role !== 2) {
            app()->route->redirect('/studyrooms/block');
        }
    }
}