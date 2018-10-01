<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeConsultation extends Model
{
    public $timestamps = false;

    protected $fillable = ['consults_id', 'time_start', 'time_end'];

    public function consults()
    {
        return $this->belongsTo('App\Models\Consult');
    }

    public function confirmedConsultations()
    {
        return $this->hasMany('App\Models\ConfirmedConsultation', 'time_consultation_id');
    }

    public static function get_consultations(Request $request)
    {
        if ($request->has('conf')) {
            $consultations = TimeConsultation:: with('consults', 'confirmedConsultations')
                ->has('confirmedConsultations')
                ->whereHas('consults', function ($q) {
                    $q->where('user_id', '=', Auth::User()->id);
                })
                ->paginate(5);
            return $consultations;
        } elseif ($request->has('my')) {
            $consultations = TimeConsultation:: with('consults', 'confirmedConsultations')
                ->whereHas('confirmedConsultations', function ($q) {
                    $q->where('user_id', '=', Auth::User()->id);
                })
                ->paginate(5);
            return $consultations;
        } else {
            $consultations = TimeConsultation:: with('consults', 'confirmedConsultations')
                ->whereHas('consults', function ($q) {
                    $q->where('user_id', '=', Auth::User()->id);
                })
                ->paginate(5);
            return $consultations;
        }
    }
}
