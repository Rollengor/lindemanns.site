<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\Form\Contact\StoreRequest;
use App\Mail\ContactMail;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class SendContactFormController extends Controller
{
    public function store(StoreRequest $request) {
        try {
            $data = $request->validated();

            $contacts = Page::where('slug', 'contacts')->first();
            $email = data_get($contacts?->getTranslation('content_data', config('app.fallback_locale')), 'contact_email');

            if ($email) {
                Mail::to($email)->send(new ContactMail($data));
            } else {
                throw new \Exception('Email not found in settings.');
            }

            if($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Email sent successfully',
                ]);
            }

            return redirect()->back()->with('success', 'Email sent successfully');

        } catch (ValidationException $e) {

            if($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $e->errors(),
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
            }

            return redirect()->back()->with('errors', $e->errors());

        } catch (\Exception $e) {

            if($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
            }

            return redirect()->back()->with('message', $e->getMessage());

        }
    }
}
