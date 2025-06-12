<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidationCard implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $month=(int)substr($value,0,2);//月の判定用
        $year=(int)substr($value,3,2);//年の判定用
        //存在しない月である
        if($month<1||12<$month){
            $fail('有効期限を正しく入力してください');
        }
        else{
            //カードの期限切れの判定
            if(date('y')>$year){
                $fail('カードが期限切れです');
            }
            if(date('y')==$year){
                $fail('カードが期限切れです');
            }
        }
    }
}
