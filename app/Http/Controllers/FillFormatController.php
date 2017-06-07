<?php

namespace App\Http\Controllers;

use App\Format;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;

class FillFormatController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function select()
    {
        foreach (Auth::user()->condos as $condo) {
            $condos[] = $condo;
            $condoIds[] = $condo->id;
        }

        $formats = Format::whereIn('condo_id', $condoIds)->paginate(12);

        return view('fillformats.select')->with('formats', $formats);
    }

    public function write(Request $request)
    {
        $format = Format::find($request->format_id);
        
        return view('fillformats.write')->with('format', $format);
    }

    public function pdf(Request $request, Format $format)
    {
        $format = Format::find($format->id);
        $content = $request->input("format", NULL);

        $name = sprintf('formato-%s-%s.pdf', $format->typeOfFormat->name, $format->name);

        $pdf = PDF::loadView('fillformats.pdf', [
            'content' => $content
        ]);

        return $pdf->download($name);
    }
}
