<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadFileController extends Controller
{
    public function readfile()
    {
        $file = public_path('subscription.csv');

        $customerArr = $this->csvToArray($file);

        print "<pre>".print_r($customerArr, true)."</pre>";

        return 'Jobi done or what ever';

    }

    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }
}
