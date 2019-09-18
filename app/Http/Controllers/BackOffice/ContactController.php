<?php

namespace App\Http\Controllers\BackOffice;

use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Routing\Controller;
use App\Models\Contact;

/**
 * Class DashboardController.
 */
class ContactController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate();
        return view('backend.contact.index', compact('contacts'));        
    }

    public function show(Contact $contact)
    {
        return view('backend.contact.show', compact('contact'));        
    }   
    
    public function delete(Contact $contact)
    {
        $contact->delete();
        return redirect(route('backoffice.contact'))->with('success', 'Message had been deleted!');
    }       
}
