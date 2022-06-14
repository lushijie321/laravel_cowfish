<?php

namespace App\Admin\Controllers;

use App\Models\Nav;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NavController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '导航';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Nav());
        $grid->column('id', 'ID')->sortable();
        $grid->column('name');


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Nav::findOrFail($id));
        $show->field('id', 'ID');
        $show->field('name', '导航');


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Nav());
        $form->text('name')->value('');


        return $form;
    }
}
