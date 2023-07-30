<?php
 namespace App\Shortener;

use App\Entity\Shortener;
use App\Repository\ShortenerRepository;
use App\Shortener\Helpers\MyExeption;


class DbRepositori
{

    /**
     * @param ShortenerRepository $SRepo
     */
    public function __construct(protected ShortenerRepository $SRepo)
    {

    }






    public function saveInDB(string $url, string $code)
    {
        $data = [
            'code' => $code,
            'url' => $url,

        ];
        $entity = new Shortener($data);
       $this->SRepo->save($entity, true);


    }

    public function dbCheckCode(string $url): string
    {
        if ( !$code = $this->asdadwqdasdacas(['url'=>$url],  'getCode')){
            throw new MyExeption();
        }
        return $code;


    }


    public function dbCheckUrl(string $code): string
    {

        if (!$url = $this->asdadwqdasdacas(['code'=>$code], 'getUrl')){

            throw new MyExeption('');
        }
        return $url;



    }








    protected function asdadwqdasdacas(array $criteria, string $method)
    {
        try {
            $data = $this->SRepo->findOneBy($criteria)->{$method}();
        } catch (\Throwable) {
            throw new MyExeption('');
        }
        return $data;
    }



}