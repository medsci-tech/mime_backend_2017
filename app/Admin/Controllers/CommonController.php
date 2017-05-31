<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

class CommonController extends Controller
{
    use ModelForm;

    public function cIndex(){
        return Admin::content(function(Content $content) {
            $content->header('header');
            $content->description('description');
            $content->body($this->grid());
        });
    }

    public function cEdit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('header');
            $content->description('description');
            $content->body($this->form()->edit($id));
        });
    }

    public function cCreate()
    {
        return Admin::content(function (Content $content) {
            $content->header('header');
            $content->description('description');
            $content->body($this->form());
        });
    }
}
