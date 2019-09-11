<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use League\Csv\Reader;
use Illuminate\Http\Request;
use DB;
class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title = DB::table('setting')->first();

        return view('pages.dashboard.setting', ['title' => $title]);
    }

    public function title(Request $request)
    {
        $title = $request->input('title');
        DB::table('setting')->where('key', 'title')->update(['value' => $title]);
        return redirect()->route('admin.setting.index')->with('success', 'ok! successfully Change Title');
    }

    public function csvUpload(Request $request)
    {
        $type_csv = $request->input('type-csv') ;
        $path = $request->file('csv_file');
        $header = null;
        $data = array();
        $delimiter = ',';

        if (!file_exists($path) || !is_readable($path))
            return false;

        if (($handle = fopen($path, 'r')) !== false)
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

        if($type_csv == 'users')
        {
            for ($i = 0; $i < count($data); $i ++)
            {
                User::firstOrCreate($data[$i]);
            }

        }
        elseif ($type_csv == 'services')
        {
            for ($i = 0; $i < count($data); $i ++)
            {
                Service::firstOrCreate($data[$i]);
            }
        }
    }
}
