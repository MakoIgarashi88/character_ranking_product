<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Character extends Model
{
    use HasFactory;

    /**
     * @param String $new_image 新しい画像
     * @param String $old_image 古い画像
     * @return String 新しい画像のパス
     */
    public static function imageStore($new_image = null, $old_image = null)
    {
        /**
         * １：古い＝ある　新しい＝ある　→編集モード（画像を新しいものに変更したいとき）
         * ２：古い＝ある　新しい＝ない　→編集モード（画像は変更したくない）
         * ３：古い＝ない　新しい＝ある　→新規追加　（画像を最初から付ける）
         * ４：古い＝ない　新しい＝ない　→新規追加　（画像は登録しない）←必須項目ではないので可能
         */


        // 古い画像を削除
        if ($new_image && $old_image) {
            // 元々入っていた画像が/storage/imagesの物だった場合、削除処理を実行しない
            if (strpos($old_image, '/storage/images/') === false) {
                $name = str_replace('/storage/', '', $old_image);
                Storage::disk('public')->delete($name);
            }
        }

        if (!$new_image && !$old_image) return '/storage/images/default.jpeg';
        if (!$new_image && $old_image) return $old_image;

        // 新しい画像が添付されていれば、登録する
        $mime_type = mime_content_type($new_image);
        $new_image = str_replace('data:'.$mime_type.';base64,', '', $new_image);
        $new_image = str_replace(' ', '+', $new_image);
        $fileData = base64_decode($new_image);
        $file_name = 'uploads/' . Str::random(16) . '.png';
        Storage::disk('public')->put($file_name, $fileData);

        $image_name = '/storage/' . $file_name;

        return $image_name;
    }
}
