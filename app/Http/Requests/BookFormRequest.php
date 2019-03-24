<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Book;
class BookFormRequest extends FormRequest
{
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

            'title'=>"required",
            'mrp'=>['numeric','nullable'],
            'isbn10' => ['numeric', 'nullable'],
            'isbn13' => ['numeric', 'nullable'],
            'selling_price' => ['numeric', 'required'],

            

            
        ];
}
    public function saveBook(Book $book)
    {
        $book->title=$this->title;
        $book->auther=$this->auther;
        $book->isbn10=$this->isbn10;
        $book->isbn13=$this->isbn13;
        return $book->save;
    }
}
