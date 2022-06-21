<?php

namespace App\Http\Controllers;

use App\User;
use App\College;
use App\Profile;
use App\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentVerificationController extends Controller
{
    public function verify(Request $request)
    {
        $status = $request->q;
        // dd($status);
        $oid = $request->oid;
        $refId = $request->refId;
        $amt = $request->amt;
        // dump($oid, $refId, $amt);

            $url = "https://uat.esewa.com.np/epay/transrec";
            $data = [
                'amt' => 100,
                'rid' => $refId,
                'pid' => $oid,
                'scd' => 'EPAYTEST',
            ];

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);

            if (strpos($response, "Success") == true) {
                $college_id = $oid[0];
                $profile_id = Auth::user()->id;
                return $this->applyCollege($college_id, $profile_id);
                // dd($profile_id);
                // dd('transaction was successfull');
            } else {
                // dd('transaction failed');
                return redirect('/home')->withDangerstatus('Payment Unsuccessful. Make payment again!');
            }
    }

    public function applyCollege($application_id, $profile_id){
        // return $application_id;
        $totalColleges = College::all();
        $collegeCount = count($totalColleges);
        $count = 0;
        $profile = Profile::find($profile_id);
        $application = Application::find($application_id);
        // return $application->id;
        foreach($profile->applications as $entity){
            // echo ($hello->pivot->application_id)."<br>";
            $count = $count + 1;
            // echo $count."<br>";
        }
        // return $count;
        $priority = $collegeCount - $count;
        $applicant_id = uniqid();
        // return $applicant_id;
        // return $priority;
        $profile->applications()->attach($application_id, ['priority' => $priority, 'unique_id' => $applicant_id]);  

        $user  = User::findOrFail(Auth::user()->id);
        $user->has_applied = 1;
        $user->save();

        return redirect('/home')->withStatus('You have applied to the college successfully.');
    }
}
