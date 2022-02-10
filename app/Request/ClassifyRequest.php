<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Request;

use Hyperf\Validation\Request\FormRequest;

class ClassifyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        switch ($this->getMethod()) {
            case 'POST':
                $name = 'required|string|max:10|unique:classifies';
                break;
            case 'PATCH':
                $id = $this->route('id');
                $name = 'required|string|max:10|unique:classifies,name,' . $id;
                break;
        }

        return [
            'type' => 'required|integer',
            'name' => $name,
            'grade' => 'required|integer|between:1,100',
        ];
    }
}
