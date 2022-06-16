<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->column('id', 'ID')->sortable();
        $grid->column('title');
        $grid->column('created_at')->date('Y-m-d');
        $grid->column('updated_at')->date('Y-m-d');

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
        $show = new Show(Article::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('title', '标题');
        $show->field('author', '作者');
        $show->field('introduce','介绍');
        $show->field('content', '内容');
        $show->field('column', '栏目');
        $show->field('updated_at');
        $show->field('release_at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article());
        
        $form->text('title')->value('标题');
        $form->text('author')->value('作者');
        $form->textarea('introduce', '简介');
        $form->ckeditor('content', '内容');
        $directors = [
            1 => '首页',
            2 => 'Java入坑',
            3 => '随笔' ,
        ];

        $form->select('column', '栏目')->options($directors);
        return $form;
    }
}
