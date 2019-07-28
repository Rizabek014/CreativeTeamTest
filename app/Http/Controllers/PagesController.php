<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Hell';
        return view('pages.index')->with('title',$title);
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title',$title);
    }

    public function service(){ 
        $data = array(
            'title' => 'Services',
            'paragraph' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.service')->with($data);
    }
}
