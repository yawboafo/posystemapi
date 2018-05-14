<?php
/**
 * Created by PhpStorm.
 * User: smsgh
 * Date: 14/05/2018
 * Time: 3:13 PM
 */

namespace app\Utilities;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use Image;
class Utility
{

    public static function uploadImage(Request $request,$image_input_name)
    {


        $image_name = $request->file($image_input_name)->getRealPath();
        Cloudder::upload($image_name, null);
        $value = Cloudder::getResult();
        $jsonValue = json_encode($value);
        $jsonValue =  json_decode($jsonValue);

        return $jsonValue->secure_url;

    }

    public static function generateThumbnail(Request $request,$image_input_name){



        $photo = $request->file($image_input_name)->getRealPath();
        $thumb_img = Image::make($photo)->fit(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg');

        Cloudder::upload($thumb_img, null);
        $value = Cloudder::getResult();
        $jsonValue = json_encode($value);
        $jsonValue =  json_decode($jsonValue);

        return $jsonValue->secure_url;

    }


}