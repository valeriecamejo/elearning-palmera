<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserEvaluation;
use App\Evaluation;
use App\Brand;
use App\User;
use PDF;

class PdfController extends Controller
{
	public function exportCertificate($user_evaluation_id) {

		//Informacion para mostrar en la vista del certificado
		$user_evaluation  = UserEvaluation::find($user_evaluation_id);
		$user             = User::find($user_evaluation->user_id);
		$brand            = Brand::find($user->brand_id);
		$evaluation_data  = Evaluation::find($user_evaluation->evaluation_id);
		//Exportar archivo en pdf
		$pdf = PDF::loadView('user.certificate', compact('user_evaluation', 'user', 'evaluation_data', 'brand'));
		return $pdf->download('certificate.pdf');
	}
}
