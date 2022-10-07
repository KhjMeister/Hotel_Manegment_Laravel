@extends('admin.layout.app')

@section('heading','Posts')

@section('right_top_button')
<a href="{{ route('admin_post_add') }}" class="button green">Add New</a>
@endsection



@section('main_content')

<section class="section main-section">




    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                Posts
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
                        <th>content</th>
                        <th>photo</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td data-label="Company">{{ $post->heading }}</td>
                        <td data-label="City">{{ $post->short_content }}</td>

                        <td>
                            <div class="image w-48  mx-auto">
                                <img src="{{ asset('uploads/posts/'.$post->photo) }}" alt="pic" class="full">
                            </div>
                        </td>

                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                                <a href="{{ route('admin_post_edit',$post->id) }}" class="button small blue "
                                    type="button">
                                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                                </a>
                                <a href="{{ route('admin_post_delete',$post->id) }}" class="button small red "
                                    type="button">
                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                    
                </tbody>
            </table>
            {{ $posts->links('vendor.pagination.admin') }}

        </div>
    </div>
</section>



<div class="divider"></div>

@endsection