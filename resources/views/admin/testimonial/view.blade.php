@extends('admin.layout.app')

@section('heading','Testimonials')

@section('right_top_button')
<a href="{{ route('admin_testimonial_add') }}" class="button green">Add New</a>
@endsection



@section('main_content')

<section class="section main-section">




    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                Feature
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
                        <th>designation</th>
                        <th>Photo</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $testimonial)
                    <tr>
                        <td data-label="Company">{{ $testimonial->name }}</td>
                        <td data-label="City">{{ $testimonial->designation }}</td>
                        <td>
                            <img src="{{ asset('uploads/testimonials/'.$testimonial->photo) }}" alt="pic" class="full">
                        </td>

                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                                <a href="{{ route('admin_testimonial_edit',$testimonial->id) }}" class="button small blue " type="button">
                                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                                </a>
                                <a href="{{ route('admin_testimonial_delete',$testimonial->id) }}"
                                    class="button small red " type="button">
                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
            <div class="table-pagination">
                <div class="flex items-center justify-between">
                    <div class="buttons">
                        <button type="button" class="button active">1</button>
                        <button type="button" class="button">2</button>
                        <button type="button" class="button">3</button>
                    </div>
                    <small>Page 1 of 3</small>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="divider"></div>

@endsection