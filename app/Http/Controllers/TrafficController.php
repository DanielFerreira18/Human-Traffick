<?php

namespace App\Http\Controllers;

Use App\Report;
Use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TrafficController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    public function index()
    {
        $reports = Report::where('idUsers',auth()->id())->get();

        return view('welcome', compact('reports'));
    }

    public function create()
    {
        return view('traffic.create');
    }

    public function store(Report $report)
    {
        function rand_float($st_num=0,$end_num=1,$mul=1000000)
        {
            return mt_rand($st_num*$mul,$end_num*$mul)/$mul;
        }

        $report = (request()->validate([
            'report_type' => ['required'],
            'city' => ['required'],
            'persons' => ['required'],
            'description' => ['max:250'],
        ]));

        $report ['idUsers'] = auth()->id();

        switch($report['city']){
            case 'Aveiro':
                $report ['Longitude'] = rand_float(-8.65436, -8.33479);//
                $report ['Latitude'] = rand_float(40.48871, 40.95867);//

                break;
            case 'Beja':
                $report ['Longitude'] = rand_float(-8.26098, -7.54226);//
                $report ['Latitude'] = rand_float(37.53938, 38.14047);//

                break;
            case 'Braga':
                $report ['Longitude'] = rand_float(-8.50274, -8.13402);//
                $report ['Latitude'] = rand_float(41.42213, 41.69671);//

                break;
            case 'Braganca':
                $report ['Longitude'] = rand_float(-7.15254, -6.58936);//
                $report ['Latitude'] = rand_float(41.31683, 41.89597);//

                break;
            case 'Castelo Branco':
                $report ['Longitude'] = rand_float(-7.94000, -7.04361);//
                $report ['Latitude'] = rand_float(39.67603, 39.99700);//

                break;
            case 'Coimbra':
                $report ['Longitude'] = rand_float(-8.85776, -7.89731);//
                $report ['Latitude'] = rand_float(40.09421, 40.28575);//

                break;
            case 'Evora':
                $report ['Longitude'] = rand_float(-8.23160, -7.34786);//
                $report ['Latitude'] = rand_float(38.33643, 38.76163);//

                break;
            case 'Faro':
                $report ['Longitude'] = rand_float(-8.84858, -7.47054);
                $report ['Latitude'] = rand_float(37.18559, 37.33367);

                break;
            case 'Guarda':
                $report ['Longitude'] = rand_float(-7.44937, -6.85945);
                $report ['Latitude'] = rand_float(40.42563, 40.80718);

                break;
            case 'Leiria':
                $report ['Longitude'] = rand_float(-8.94172, -8.72285);
                $report ['Latitude'] = rand_float(39.53940, 39.93592);

                break;
            case 'Lisboa':
                $report ['Longitude'] = rand_float(-9.33667, -9.09555);
                $report ['Latitude'] = rand_float(38.70374, 39.19994);

                break;
            case 'Portalegre':
                $report ['Longitude'] = rand_float(-7.91530, -7.33534);
                $report ['Latitude'] = rand_float(39.01669, 39.44433);

                break;
            case 'Porto':
                $report ['Longitude'] = rand_float(-8.69140, -7.97582);
                $report ['Latitude'] = rand_float(41.10595, 41.30661);

                break;
            case 'Santarem':
                $report ['Longitude'] = rand_float(-8.78015, -8.37466);
                $report ['Latitude'] = rand_float(38.85534, 39.45052);

                break;
            case 'Setubal':
                $report ['Longitude'] = rand_float(-8.79681, -8.45484);
                $report ['Latitude'] = rand_float(37.85969, 38.49128);

                break;
            case 'Viana do Castelo':
                $report ['Longitude'] = rand_float(-8.73910, -8.23756);
                $report ['Latitude'] = rand_float(41.80589, 41.96328);

                break;
            case 'Vila Real':
                $report ['Longitude'] = rand_float(-7.78156, -7.44235);
                $report ['Latitude'] = rand_float(41.22746, 41.78976);

                break;
            case 'Viseu':
                $report ['Longitude'] = rand_float(-8.06008, -7.66485);
                $report ['Latitude'] = rand_float(40.57183, 41.06942);

                break;
        }

        Report::create($report);

        return redirect('');
    }


    public function show(Report $report, User $user) {
        $user = Auth::user();

        if($user->idUserType == 1 or $user->idUserType == 2) {

            return view('show', compact('report', 'user'));

        } else {

        abort_unless($report->idUsers == auth()->id() , 403);
        return view('show', compact('report', 'user'));
        }
    }

    public function edit(Report $reports) {

        return view ('editReport',compact('reports'));

    }

    public function update(Report $report)
    {
        $report->update(request()->validate([

            'idReportState' => ['required'],
        ]));

        return redirect('');
    }

    public function destroy(Report $report)
    {

    }
}
