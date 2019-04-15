@extends('layouts.layout')

@section('content')

    <div class="title">
        Liste des Contacts
    </div>

    <a href="{{route('contact.create')}}" class="btn btn-add"><i class="fas fa-plus-square"></i> | Ajouter un contact</a>

    <div id="search">
        Rechercher <input type="text" id="searchbox" />
    </div>
    <table id="table" class="dataTable"  border="1">
        <thead style="background-color: #008080">
        <tr>
            <th>Civilité</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>E-mail</th>
            <th>Société</th>
            <th>Ville</th>
            <th><i class="fa fa-align-justify" style="float: right"></i></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($contacts as $contact)

            <tr>
                @if($contact->civility == "Madame")
                    <td><i class="fas fa-female" style="color: deeppink"></i></td>
                @elseif($contact->civility == "Monsieur")
                    <td><i class="fas fa-male" style="color: #adb5bd"></i></td>
                @endif
                <td>{{$contact->name}}</td>
                <td>{{$contact->last_name}}</td>
                <td>{{$contact->phone_number}}</td>
                <td>{{$contact->email}}</td>
                <td>{{optional($contact->society)->name}}</td>
                <td>{{optional($contact->society)->city}}</td>
                    <td><a href="{{route('contact.show',$contact->id)}}"><i class="fa fa-pen"></i></a> &nbsp;<a href="{{route('contact.delete',$contact->id)}}"><i class="fa fa-trash-alt"></i></a>&nbsp;<a href="{{route('contact.show',$contact->id)}}"><i class="fa fa-eye"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
            $(".dataTables_length").hide();
        } );
        function goToRoute(){
            param = document.getElementById('searchbox').value;
            if(param == "")
                window.location.href='/contact';
            else{
                url = "{{ route('contact.search') }}";
                src = window.location.href;
                uri = new URL('http://'+url);
                uri.searchParams.set('q',param);
                uri = uri.toString().replace('http//','');
                window.location.href= uri;
            }
        }
        document.getElementById('searchbox').addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                goToRoute();
            }
        });

    </script>
@endsection