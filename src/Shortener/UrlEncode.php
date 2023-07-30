<?php
namespace App\Shortener;







use App\Shortener\Interfaces\IUrlValidator;

use http\Exception\InvalidArgumentException;


use App\Shortener\Interfaces\IUrlDecoder;
use App\Shortener\Interfaces\IUrlEncoder;

use App\Shortener\Helpers\UrlValidator;
use App\Shortener\Helpers\MyExeption;



class UrlEncode  implements IUrlEncoder, IUrlDecoder
{
    const CODE_LENGTH = 8;

    const CODE_CHAIRS = '1234567890qwertyuiopasdfghjklzxcvbnm';

    protected int $codeLength = 6;



    /**
     * @param DbRepositori $filelog
     * @param IUrlValidator $validator
     * @param int $codeLength
     */

    public function __construct(
        protected  DbRepositori $filelog,
        protected UrlValidator $validator,
        int    $codeLength = self::CODE_LENGTH


    )
    {
        $this->codeLength=$codeLength;





    }


 public function encode(string $url): string
{
    $this->validator->validateUrl($url);

    try {(
        $code= $this->filelog->dbCheckCode($url));
    } catch (MyExeption $e){

        $code= $this->createCodeAndSave($url);

    }
return $code;
}




    protected function createCodeAndSave(string $url):string
    {
        $code = $this->generateUniqueCode();

        $this->filelog->saveInDB($url, $code);
        return $code ;

    }


    protected function generateUniqueCode(): string
    {
        $date = new \DateTime();
        $str = static::CODE_CHAIRS . mb_strtoupper(static::CODE_CHAIRS) . $date->getTimestamp();
        return $code = substr(str_shuffle($str), 0, $this->codeLength);
    }




    public function decode(string $code):string
    {
            try {
                $url = $this->filelog->dbCheckUrl($code);

            } catch (MyExeption $e) {
                throw new  InvalidArgumentException("We dont have your Url ");
            }

            return $url;

        }










}