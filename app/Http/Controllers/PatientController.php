<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use App\Models\FirstPatient;



class PatientController extends Controller
{
    public function showAllPatient(){
		$a = array(Patient::all());
		$b = array(FirstPatient::all());
		$c = array(DB::connection('mysql')->table('another_patients')->get());
		$f = DB::connection('mongodb')->collection('patient_records')->get()->toArray();
		
		$d = array_merge($a,$b,$c,$f);
		return $d;
		
	}
	public function showPatientUsingName(string $name){
		$test = DB::connection('mysql')->table('another_patients')->where('patient_name',$name)->get();
		$test1 = DB::connection('mariadb')->table('first_patients')->where('patient_name',$name)->get();
		$test2 = DB::connection('sqlite')->table('patients')->where('patient_name',$name)->get();
		$test3 = DB::connection('mongodb')->collection('patient_records')->where('name','=',$name)->get();
		
		$data = [
			'Medical A'=>$test,
			'Medical B'=>$test1,
			'Medical C'=>$test2,
			'Medical D'=>$test3,
		];
		
		return response()->json($data,200);
		
	}
	public function showPatientTestReport(string $name,string $report){
		$test = DB::connection('mysql')->table('another_patients')->where('patient_name',$name)
		->where('test',$report)->select('test','test_report')->get();
		$test1 = DB::connection('mariadb')->table('first_patients')->where('patient_name',$name)
		->where('test',$report)->select('test','test_report')->get();
		$test2 = DB::connection('sqlite')->table('patients')->where('patient_name',$name)->where('test',$report)->select('test','test_report')->get();
		$test3 = DB::connection('mongodb')->collection('patient_records')->where('name','=',$name)->where('test','=',$report)->get();
		
		$data = [
			'Medical A Test Report'=>$test,
			'Medical B Test Report'=>$test1,
			'Medical C Test Report'=>$test2,
			'Medical D Test Report'=>$test3,
		];
		
		return response()->json($data,200);
		
	}
	public function searchPatientById(int $id){
		$test = DB::connection('mysql')->table('another_patients')->where('id',$id)->get();
		$test1 = DB::connection('mariadb')->table('first_patients')->where('id',$id)->get();
		$test2 = DB::connection('sqlite')->table('patients')->where('id',$id)->get();
		$test3 = DB::connection('mongodb')->collection('patient_records')->where('_id','=',$id)->get();
		
		$data = [
			'Medical A'=>$test,
			'Medical B'=>$test1,
			'Medical C'=>$test2,
			'Medical D'=>$test3,
		];
		
		return response()->json($data,200);
		
	}





	public function patientDetailsById(int $id){
		$test3 = array(DB::connection('mysql')->table('another_patients')->where('id',$id)->select('test','test_report')->get());
		$test1 = array(DB::connection('mariadb')->table('first_patients')->where('id',$id)->select('test','test_report')->get());
		$test2 = array(DB::connection('sqlite')->table('patients')->where('id',$id)->select('test','test_report')->get());
		$test = array(DB::connection('mongodb')->collection('patient_records')->where('_id','=',$id)->get());
		$result = array_merge($test,$test1,$test2,$test3);
		
		$data = [
			'Patient Details: '=>$result,
			//'database1'=>$test,
			//'database2'=>$test1,
			//'database3'=>$test2,
			//'database4'=>$test3,
		];
		
		return response()->json($data,200);
		
	}	
	
	
	
	public function patientDetailsByName(string $name){
		$test3 = array(DB::connection('mysql')->table('another_patients')->where('patient_name',$name)->select('test','test_report')->get());
		$test1 = array(DB::connection('mariadb')->table('first_patients')->where('patient_name',$name)->select('test','test_report')->get());
		$test2 = array(DB::connection('sqlite')->table('patients')->where('patient_name',$name)->select('test','test_report')->get());
		$test = array(DB::connection('mongodb')->collection('patient_records')->where('name','=',$name)->get());
		$result = array_merge($test,$test1,$test2,$test3);
		
		$data = [
			'Patient Details: '=>$result,
			//'database1'=>$test,
			//'database2'=>$test1,
			//'database3'=>$test2,
			//'database4'=>$test3,
		];
		
		return response()->json($data,200);
		
	}
	

	

	
	public function searchPatientByIdName(int $id,string $name){
		$test = DB::connection('mysql')->table('another_patients')->where('id',$id)->where('patient_name',$name)->get();
		$test1 = DB::connection('mariadb')->table('first_patients')->where('id',$id)->where('patient_name',$name)->get();
		$test2 = DB::connection('sqlite')->table('patients')->where('id',$id)->where('patient_name',$name)->get();
		$test3 = DB::connection('mongodb')->collection('patient_records')->where('_id','=',$id)->where('name','=',$name)->get();
		
		$data = [
			'Medical A'=>$test,
			'Medical B'=>$test1,
			'Medical C'=>$test2,
			'Medical D'=>$test3,
		];
		
		return response()->json($data,200);
		
	}
	



	
	
}

































































/* json_all for showing all data in one array


	public function testallId(int $id){
		$test = array(DB::connection('mysql')->table('another_patients')->where('id',$id)->select('test','test_report')->get());
		$test1 = array(DB::connection('mariadb')->table('first_patients')->where('id',$id)->select('test','test_report')->get());
		$test2 = array(DB::connection('sqlite')->table('patients')->where('id',$id)->select('test','test_report')->get());
		$test3 = array(DB::connection('mongodb')->collection('patient_records')->where('_id','=',$id)->get());
		$result = json_encode(array_merge($test,$test1,$test2,$test3));
		
		$data = [
			
			'report'=>[
				'patient_details'=>$result[3],
				'test2'=>$result[0],
				'test3'=>$result[1],
				'test4'=>$result[2],
				
			],
			
			'report'=>[
				'patient_details'=>$result,
				
			],
			
			//'database1'=>$test,
			//'database2'=>$test1,
			//'database3'=>$test2,
			//'database4'=>$test3,
		];
		
		return response()->json($data,200);
		
	}
	
*/