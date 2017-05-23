<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OpenClass as ThisModel;
use App\Models\OpenClassUnit;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class OpenClassController extends Controller
{
    use ModelForm;

    protected function grid(){
        return Admin::grid(ThisModel::class, function(Grid $grid){
            $grid->column('id', 'ID')->sortable();
            $grid->column('title', '标题');
            $grid->column('label', '标签');
            $grid->column('abstract_content', '简介');
            $grid->column('video_url', '视频链接');
            $grid->column('teacher.name', '讲师');
            $grid->column('unit.title', '系列');
        });
    }

    public function index(){
        return Admin::content(function(Content $content) {
            $content->header('header');
            $content->description('description');
            $content->body($this->grid());
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    protected function form()
    {
        return Admin::form(ThisModel::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title', '标题');
            $form->text('tag', '标签');
            $form->text('abstract_content', '简介');
            $form->text('video_url', '视频链接');
            $form->select('teacher_id', '讲师')->options(Customer::all());
            $form->select('unit_id', '系列')->options(OpenClassUnit::all());

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
