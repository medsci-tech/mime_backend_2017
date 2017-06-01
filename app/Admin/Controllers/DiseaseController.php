<?php

namespace App\Admin\Controllers;

use App\Models\Customer;
use App\Models\OpenClass as ThisModel;
use App\Models\OpenClassUnit;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class DiseaseController extends CommonController
{
    use ModelForm;

    protected function grid(){
        return Admin::grid(ThisModel::class, function(Grid $grid){
            $grid->column('id', 'ID')->sortable();
            $grid->column('name_zh', '中文标题');
            $grid->column('name_en', '英文标题');
        });
    }

    protected function form()
    {
        return Admin::form(ThisModel::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name_zh', '中文标题');
            $form->text('name_en', '英文标题');

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
