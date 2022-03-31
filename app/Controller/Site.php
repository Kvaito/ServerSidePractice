<?php
namespace Controller;

use Model\Post;
use Model\User;
use Model\Institute;
use Model\Rooms;
use Model\Division;
use Illuminate\Database\Capsule\Manager as DB;
use Src\View;
use Src\Request;
use Src\Auth\Auth;
use Src\Validator\Validator;

class Site
{
    public function index(Request $request): string
    {
        $posts = Post::where('id', $request->id)->get();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function home(Request $request): string
    {
//        $location = DB::select('select * from institute where id = ?',[3]);
        $institute=Institute::all();
        return (new View())->render('site.home', ['institute' => $institute]);
    }

    public function signup(Request $request): string
    {
        if ($request->method==='POST' && User::create($request->all())){
            return new View('site.signup', ['message'=>'Пользователь зарегистрирован']);
        }
        return new View('site.signup');

//        if ($request->method === 'POST') {
//
//            $validator = new Validator($request->all(), [
//                'name' => ['required'],
//                'login' => ['required', 'unique:users,login'],
//                'password' => ['required']
//            ], [
//                'required' => 'Поле :field пусто',
//                'unique' => 'Поле :field должно быть уникально'
//            ]);
//
//            if($validator->fails()){
//                return new View('site.signup',
//                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
//            }
//
//        }
//        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/studyrooms');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/studyrooms');
    }

    public function block(): string
    {
        return new View('site.block');
    }

    //функции приложения
    public function searchroom(Request $request): string
    {
        $divisions=DB::select('select * from division where id_institute = ?',[User::getInstituteId()]);
        if(isset($_GET['formName']))
        {
            if ($request->method === 'GET' && $_GET['formName']=='checkBoxes') {
                $rooms=Rooms::getRooms($_GET['checkBoxForm']);
                return (new View())->render('site.functions.searchroom', ['divisions' => $divisions, 'rooms'=>$rooms]);
            }
        }
        return (new View())->render('site.functions.searchroom', ['divisions' => $divisions, 'rooms'=>[]]);
    }

    public function countarea(Request $request): string
    {
        $countedArea=0;
        $rooms=Rooms::getAllRooms();
        if(isset($_GET['formName']))
        {
            if ($request->method === 'GET' && $_GET['formName']=='checkboxes') {
                $countedArea=Rooms::countArea($_GET['checkBoxForm']);
                return new View('site.functions.countarea',['rooms'=>$rooms,'countedArea'=>$countedArea]);
            }
            if($request->method === 'GET' && $_GET['formName']=='allChecked')
            {
                $allRooms=Rooms::getAllRooms();
                $i=0;
                foreach ($allRooms as $room) {
                    $allRoomsId[$i]=((array) $room)['id'];
                    $i++;
                }
                $countedArea=Rooms::countArea($allRoomsId);
                return new View('site.functions.countarea',['rooms'=>$rooms,'countedArea'=>$countedArea]);
            }
        }

        return new View('site.functions.countarea',['rooms'=>$rooms,'countedArea'=>$countedArea]);
    }

    public function countplace(Request $request): string
    {
        $divisions = DB::select('select * from division where id_institute = ?', [User::getInstituteId()]);
        $countedPlace = 0;
        if (isset($_GET['formName'])) {
            if ($request->method === 'GET' && $_GET['formName'] == 'checkBoxes') {
                $countedPlace=Rooms::countPlaces($_GET['checkBoxForm']);
                return (new View())->render('site.functions.countplace', ['divisions' => $divisions, 'countedPlace' => $countedPlace]);
            }
            if ($request->method === 'GET' && $_GET['formName'] == 'allChecked') {
                $countedPlace=Rooms::countPlaces($_GET['checkBoxForm']);
                return (new View())->render('site.functions.countplace', ['divisions' => $divisions, 'countedPlace' => $countedPlace]);
            }
        }
        return (new View())->render('site.functions.countplace', ['divisions' => $divisions, 'countedPlace' => $countedPlace]);
    }
    //страница администратора, фукнции добавления подразделений и помещений
    public function adminpage(Request $request): string
    {
        if (isset($_POST['formName']))
        {
            if ($request->method ==='POST' && $_POST['formName'] == 'divisionAdd') {
                $titleDiv=$_POST['title'];
                $descriptionDiv=$_POST['description'];
                $idInstitute=User::getInstituteId();
                DB::insert('insert into division (id_institute,title,description) values (?,?,?)',[$idInstitute,$titleDiv,$descriptionDiv]);
                unset($_POST);
                return (new View())->render('site.functions.adminpage', ['messageDivision'=>'Дело сделано','messageRoom'=>'']);
            }
            if ($request->method ==='POST' && $_POST['formName'] == 'roomAdd') {
                Rooms::addRoom($_POST);
                unset($_POST);
                return (new View())->render('site.functions.adminpage', ['messageDivision'=>'','messageRoom'=>'Дело сделано']);
            }
        }
        return (new View())->render('site.functions.adminpage', ['messageDivision'=>'','messageRoom'=>'']);
    }

    public function deletepage(Request $request):string
    {
        if (isset($_POST['formName']))
        {
            if ($request->method ==='POST' && $_POST['formName'] == 'divisionDelete') {
                $titleDiv=$_POST['title'];
                DB::delete('delete from division where id_institute=? and title=?',[User::getInstituteId(),$titleDiv]);
                unset($_POST);
                return (new View())->render('site.functions.deletepage', ['messageDivision'=>'Дело сделано','messageRoom'=>'']);
            }
            if ($request->method ==='POST' && $_POST['formName'] == 'roomDelete') {
                Rooms::deleteRoom($_POST);
                unset($_POST);
                return (new View())->render('site.functions.deletepage', ['messageDivision'=>'','messageRoom'=>'Дело сделано']);
            }
        }
        return (new View())->render('site.functions.deletepage', ['messageDivision'=>'','messageRoom'=>'']);
    }

}