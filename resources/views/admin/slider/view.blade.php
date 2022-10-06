@extends('admin.layout.app')

@section('heading','Slider')

@section('right_top_button')
<a href="{{ route('admin_slide_add') }}" class="button green">Add New</a>
@endsection



@section('main_content')

<section class="section main-section">




    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                Slides
            </p>
            <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
        </header>
        <div class="card-content">
            <table>
                <thead>
                    <tr>
                        <th>heading</th>
                        <th>text</th>
                        <th>Status</th>
                        <th>picture</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slides as $slide)
                    <tr>
                        <td data-label="Company">{{ $slide->heading }}</td>
                        <td data-label="City">{{ $slide->text }}</td>
                        <td data-label="Progress" class="progress-cell">
                            <div class="field-body">
                                <div class="field">
                                    <label class="switch">
                                        <input type="checkbox" {{ $slide->status ? 'checked' : '' }} value="false">
                                        <span class="check"></span>
                                        <span class="control-label">{{ $slide->status ? 'Active' : 'Deactive' }}</span>
                                    </label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="image w-48  mx-auto">
                                <img src="{{ asset('uploads/slides/'.$slide->photo) }}" alt="pic" class="full">
                            </div>
                        </td>

                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                                <a href="{{ route('admin_slide_edit',$slide->id) }}" class="button small blue " type="button">
                                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                                </a>
                                <a href="{{ route('admin_slide_delete',$slide->id) }}"
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