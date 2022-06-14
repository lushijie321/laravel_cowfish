<?php
namespace App\Admin\Controllers;

use Encore\Admin\Widgets\Form;
use App\Models\Config;
use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Setting extends Form
{
    public $title = '网站设置';

    public $description = '介绍';
    
    public function handle(Request $request)
    {
        $input = $request->all();
        //图片上传
        $file = $request->file('logo');
        if($file){
            //值例如 upload/images/avatars/202123/21
            $folder_name = "uploads/".date('Ym/d/',time());
            $upload_path = public_path() . "/" . $folder_name;
            $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
            $filename = time().'.'. $extension;
            //将图片移动到我们目标存储路径中
            $file->move($upload_path , $filename);
            $input['logo'] = "/$folder_name/$filename";
        }
        
        //var_dump($input);die;
            
        $is = DB::table('admin_config')->value('title');
        //如果是第一次添加内容就添加
        if($is == ''){
            $res = DB::table('admin_config')->insert($input);
        }else{
            //之后都是更新
            $res = DB::table('admin_config')->update($input);
            
        }
        $res?admin_success('数据处理成功.'):admin_success('数据处理成功失败.');
        return back();
        // 处理完成之后回到原来的表单页面，或者通过返回`redirect()`方法跳转到其它页面
        return back()->with(['result' => $result]);
    }
    
    
    /**
     * Build a form here.
     */
    public function form()
    {
        $info = DB::table('admin_config')->first();
        
        $this->text('title')->default($info->title);
        $this->text('subtitle')->default($info->subtitle);
        
        $this->image('logo')->move('/uploads')->uniqueName()->attribute('data-initial-preview', $info->logo);
        $this->text('beian')->default($info->beian);
        $this->datetime('created_at')->default($info->created_at);
    }
}