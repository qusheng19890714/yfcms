<?php
namespace Modules\Core\Support;
use Intervention\Image\Facades\Image;

/**
 * 前台头像上传处理类
 * Class AvatarUploadHander
 * @package Modules\Core\Support
 */
class AvatarUploadHander
{
    //可允许上传的图像
    protected $allowed_ext = ['png', 'jpg', 'gif', 'jpeg'];

    public function save($file, $file_prefix, $max_width = false)
    {
        //构建存储的文件夹规则
        $folder_name = '/uploads/image/avatar/' .date('Y/m/d',time()).'/';
        $upload_path = public_path() . $folder_name;

        //获取后缀名
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        $filename = $file_prefix . '_' . time() . '_' . str_random(10) . '.' . $extension;

        if (!in_array($extension, $this->allowed_ext)) {

            return false;
        }

        //存储
        $file->move($upload_path, $filename);

        // 如果限制了图片宽度，就进行裁剪
        if ($max_width && $extension != 'gif') {

            $this->resize($upload_path . $filename, $max_width);
        }

        return ['path'=>$folder_name.$filename];
    }


    /**
     * 图片裁剪
     * @param $file
     * @param $width
     */
    private function resize($file, $max_width)
    {
        $image = Image::make($file);

        // 进行大小调整的操作
        $image->resize($max_width, null, function ($constraint) {

            // 设定宽度是 $max_width，高度等比例双方缩放
            $constraint->aspectRatio();

            // 防止裁图时图片尺寸变大
            $constraint->upsize();
        });

        // 对图片修改后进行保存
        $image->save();
    }
}