<?php

namespace App\Http\Controllers\Amin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(20);

        return view('admin.contact.list', compact('contacts'));
    }

    public function delete($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('admin.contact.index')->with('success', 'Deleted successfully');
    }
}
