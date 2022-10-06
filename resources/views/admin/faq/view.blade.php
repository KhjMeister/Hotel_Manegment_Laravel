@extends('admin.layout.app')

@section('heading','FAQ')

@section('right_top_button')
<a href="{{ route('admin_faq_add') }}" class="button green">Add New</a>
@endsection



@section('main_content')

<section class="section main-section">




    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                FAQ
            </p>
            <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
        </header>
        <div class="card-content">
            <table>
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $faq)
                    <tr>
                        <td data-label="Company">{{ $faq->question }}</td>
                        <td data-label="City">{{ $faq->answer }}</td>


                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                                <a href="{{ route('admin_faq_edit',$faq->id) }}" class="button small blue "
                                    type="button">
                                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                                </a>
                                <a href="{{ route('admin_faq_delete',$faq->id) }}" class="button small red "
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