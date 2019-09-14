<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use League\Csv\Reader;
use Illuminate\Http\Request;
use DB;
use Response;
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
        $result = '';
        if($type_csv == 'user')
        {
            for ($i = 0; $i < count($data); $i ++)
            {
                $result = User::firstOrCreate($data[$i]);
            }
            if($result)
            return redirect()->route('admin.setting.index')->with('success', 'Successfully Import Data Users');
        }
        elseif ($type_csv == 'service')
        {
            for ($i = 0; $i < count($data); $i ++)
            {
                $result = Service::firstOrCreate($data[$i]);
            }
            if($result)
                return redirect()->route('admin.setting.index')->with('success', 'Successfully Import Data Services');
        }
        else{
            return redirect()->route('admin.setting.index')->withErrors('Error In CSV File');
        }
    }

    public function csvExportUser()
    {
        $table = User::all();
        $filename = "users.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('id', 'first_name', 'last_name', 'phone', 'email', 'address', 'password', 'admin_role', 'created_at', 'updated_at'));

        foreach($table as $row) {
            fputcsv($handle, array($row['id'], $row['first_name'],
                $row['last_name'], $row['phone'],
                $row['email'], $row['address'],
                $row['password'], $row['admin_role'],
                $row['created_at'], $row['update_at']));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename, 'users.csv', $headers);
    }

    public function csvExportService()
    {
        $table = Service::all();
        $filename = "services.csv";
        $handleServices = fopen($filename, 'w+');
        fputcsv($handleServices, array('id', 'name', 'duration', 'miles', 'price', 'created_at', 'updated_at'));

        foreach($table as $row) {
            fputcsv($handleServices, array($row['id'], $row['name'],
                $row['duration'], $row['miles'],
                $row['price'], $row['created_at'],
                $row['update_at']));
        }

        fclose($handleServices);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename, 'services.csv', $headers);
    }
}
