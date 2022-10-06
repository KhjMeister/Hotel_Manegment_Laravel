@extends('admin.layout.app')

@section('heading','Contacts')




@section('main_content')

<section class="section main-section">




    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                Contacts
            </p>
            <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
        </header>
        <div class="card-content">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td data-label="Company">{{ $contact->name }}</td>
                        <td data-label="Company">{{ $contact->email }}</td>
                        <td data-label="Company">{{ $contact->phone }}</td>
                        <td data-label="City">{{ $contact->message }}</td>


                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                                <a href="{{ route('admin_contact_delete',$contact->id) }}" class="button small red "
                                    type="button">
                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
            
        </div>
    </div>
</section>



<div class="divider"></div>

@endsection