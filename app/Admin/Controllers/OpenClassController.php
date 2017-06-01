<?php

namespace App\Admin\Controllers;

use App\Models\Customer;
use App\Models\OpenClass as ThisModel;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class OpenClassController extends CommonController
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
            $grid->column('chapter.unit.title', '系列');
            $grid->column('chapter.title', '章节');
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

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }


    public function index(){
        return $this->cIndex();
    }

    public function edit($id)
    {
        return $this->cEdit($id);
    }

    public function create()
    {
        return $this->cCreate();
    }
}
