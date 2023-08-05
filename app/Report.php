<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['idUsers','report_type','description','city','idReportState', 'persons','Longitude','Latitude'];

}
