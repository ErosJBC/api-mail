<?php

namespace App\Http\Controllers;

use App\Mail\MailResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller {
    
    public function send(Request $request) {

        $validator = $request -> validate([
            'name' => 'required',
            'organization' => 'required',
            'rolUser' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);


        if (!$validator) {
            return response() -> json([
                'success' => false,
                'errors' => 'Error validate data'
            ], 422);
        }

        $email = $validator;

        if ($email) {
            try {
                Mail::mailer('smtp') -> to('consultas_binareon@outlook.com', 'binareon.deploy@gmail.com') -> send(new MailResponse($email));
                return response() -> json([
                    'success' => true,
                    'message' => 'Mail has been sended successfully'
                ], 200);
            } catch (\Exception $err) {
                return response() -> json([
                    'success' => false,
                    'message' => 'Could not send email, please try again. '. $err
                ], 500);
            }
        }

        return response() -> json([
            'success' => false,
            'message' => 'Failed send'
        ], 500);
    }
}
