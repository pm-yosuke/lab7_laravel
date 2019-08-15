<?php

namespace App\Http\Requests\Upload;

use App\Http\Requests\ValidationErrorResponseCustomizer;
use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    use ValidationErrorResponseCustomizer;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' => [
                'required',       // 必須
                'file',           // アップロードされたファイルであること
                'image',          // 画像ファイルであること
                'mimes:jpeg,png', // MIMEタイプ
                // 'dimensions:min_width=120,min_height=120,max_width=400,max_height=400', // 最小120x120,最大400x400
                'max:5120',       // ファイルサイズ
            ]
        ];
    }
}
