@extends('admin.layout.app')

@section('heading','Contacts')

@section('page_scripts')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection

@section('main_content')

<section class="section main-section">
    <div class="card mb-6">

        <div class="card-content">
            <form method="POST" action="{{ route('admin_contact_update',$single_contact->id) }}">
                @csrf

                <div class="field">
                    <label class="label">Heading</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left">
                                <input value="{{ $single_contact->contact_heading }}" class="input" type="text"
                                    placeholder="Heading" name="contact_heading">
                                <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="field">
                    <label class="label">Location</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left">
                                <input value="{{ $single_contact->contact_location }}" class="input" type="text"
                                    placeholder="Location" name="contact_location">
                                <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="field">
                    <label class="label">Content</label>
                    <div class="control">
                        <textarea name="contact_email" class="ckeditor input" type="text" class="textarea"
                            placeholder="Email">{{ $single_contact->contact_email }}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Status</label>
                    <div class="control">
                        <div class="select">
                            <select name="contact_status">
                                <option value="1" @if($single_contact->contact_status==1) selected @endif>Active
                                </option>
                                <option value="0" @if($single_contact->contact_status==0) selected @endif>Deactive
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="field grouped">
                    <div class="control">
                        <button type="submit" class="button blue">
                            Update
                        </button>
                    </div>
                    <div class="control">
                        <button type="reset" class="button red">
                            Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</section>


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