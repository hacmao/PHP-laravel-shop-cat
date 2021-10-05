<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Aws\S3\S3Client;






class CrudController extends Controller {
    public function list(): array
    {
        $sharedConfig = [
            'profile' => 'ecn-labo',
            'region' => 'ap-northeast-1',
            'version' => 'latest'
        ];
        $s3 = new S3Client($sharedConfig);
        $result = $s3->listBuckets([]);
        foreach ($result['Buckets'] as $bucket) {
            echo $bucket['Name'] . "\n";
        }

        // Convert the result object to a PHP array
        $array = $result->toArray();
        return $array;
    }

    public function get($id) {
        $user = DB::select("select * from users where id = ?", [$id])[0];
        return $user->name;
    }
}
