@extends('admin.layout.app')

@section('heading','Features')

@section('right_top_button')
<a href="{{ route('admin_feature_add') }}" class="button green">Add New</a>
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
                        <th>heading</th>
                        <th>text</th>
                        <th>icon</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($features as $feature)
                    <tr>
                        <td data-label="Company">{{ $feature->heading }}</td>
                        <td data-label="City">{{ $feature->text }}</td>
                        
                        <td>
                            <div class="bg-white mb-12 group wow fadeInUp" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s;">
                                <div  class="w-[70px] h-[70px] flex items-center justify-center bg-primary rounded-2xl mb-8 relative z-10">
                                    <span  class="w-[70px] h-[70px] flex items-center justify-center bg-primary bg-opacity-20 rounded-2xl mb-8 absolute z-[-1] top-0 left-0 rotate-[25deg] group-hover:rotate-45 duration-300"></span>
                                    <img style="background-color: #3056D3 !important;" src="{{ asset('uploads/features/'.$feature->icon) }}" alt="pic" class="full">
                                </div>
                            </div>
                         
                        </td>

                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                                <a href="{{ route('admin_feature_edit',$feature->id) }}" class="button small blue " type="button">
                                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                                </a>
                                <a href="{{ route('admin_feature_delete',$feature->id) }}"
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