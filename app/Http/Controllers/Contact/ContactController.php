<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 13/04/2019
 * Time: 16:55
 */
namespace App\Http\Controllers\Contact;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Helpers\ViewContext;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\SocietyRequest;
use App\Services\ContactService;
use App\Society;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function index()
    {
        $viewContext      = new ViewContext('contact', 'List des contacts');
        $contacts         = Contact::paginate(15);
        $societies        = Society::all();
        $contactsPaginate = DB::table('gestioncontacts.contact')->paginate(15);

        return view('contact.list', compact('viewContext', 'contacts','contactsPaginate','societies'));
    }

    public function show(Contact $contact)
    {
        $viewContext = new ViewContext('contact', 'List des contacts');
        $society     = $contact->society()->get()->first();

        return view('contact.details', compact('viewContext', 'contact','society'));
    }

    /**
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Contact $contact)
    {
        $society     = $contact->society()->get()->first();

        $contact->delete();

        return redirect()->route('contact.index')->with(['success' => ['élément supprimé avec sucess']]);
    }

    public function create()
    {
        $viewContext = new ViewContext('contact', 'Ajouter un contact');
        $societies        = Society::all();
        return view('contact.ajout', compact('viewContext','societies'));
    }

    public function store(ContactRequest $request)
    {
        $data = $request->validated();
        $data['last_name']=ucfirst($data['last_name']);
        $data['name']=ucfirst($data['name']);
        $data['date_of_birth'] = new Carbon($data['date_of_birth']);
        $contact = new Contact($data);
        $contact->save();

        return redirect()->route('contact.show', $contact->id);
    }

    public function search(Request $request)
    {
        $param       = $request->input('q');
        $viewContext = new ViewContext('contact.index', 'List des contacts');
        $contacts    = ContactService::searchContact($param);
        $societies   = Society::all();

        if(empty($contacts) || count($contacts) == 0)
            $contacts = ContactService::getContacts('asc');


        return view('contact.list', compact('viewContext', 'contacts','societies'));
    }

    public function update(ContactRequest $request,SocietyRequest $requestSociety,Contact $contact){
        $data        = $request->validated();
        $dataSociety = $requestSociety->validated();

        $data['date_of_birth'] = new Carbon($data['date_of_birth']);

        $contact->update($data);
        $contact->society->update($dataSociety);

        return redirect()->route('contact.show', $contact->id);
    }

}