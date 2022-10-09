@extends('admin.layout.app')

@section('heading','Checkout')




@section('main_content')

<section class="section main-section">
    <div class="card mb-6">

        <div class="card-content">
            <form method="POST" action="{{ route('admin_checkout_update',$single_checkout->id) }}">
                @csrf
                
                <div class="field">
                    <label class="label">Heading</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left">
                                <input value="{{ $single_checkout->checkout_heading }}" class="input" type="text"
                                    placeholder="Heading" name="heading">
                                <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                            </div>
                        </div>

                    </div>
                </div>

                
                <div class="field">
                    <label class="label">Status</label>
                    <div class="control">
                      <div class="select">
                        <select name="status">
                          <option value="1" @if($single_checkout->checkout_status==1) selected @endif>Active</option>
                          <option value="0" @if($single_checkout->checkout_status==0) selected @endif>Deactive</option>
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


<div class="divider"></div>

@endsection