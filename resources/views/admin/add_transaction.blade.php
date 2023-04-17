@extends('layouts.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transaction</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{route('admin.home')}}>Home</a></li>
              <li class="breadcrumb-item active">Transaction</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Add Transaction by {{auth()->user()->username}}</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <form method="POST" action="{{ $data_form}}">
                    @csrf
                    {!! (isset($data))? method_field('PUT') : '' !!}

                    <div class="form-group">
                        <label for="user_id">Name</label><br>
                        <select name="user_id">
                            @foreach ($users as $user_id)
                                <option value="{{ $user_id->id }}">{{ $user_id->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="shoe_id">Shoe</label><br>
                        <select name="shoe_id">
                            @foreach ($shoes as $shoe_id)
                                <option value="{{ $shoe_id->id }}">{{ $shoe_id->brand }} - {{ $shoe_id->color }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bund_id">Bundle</label><br>
                        <select name="bund_id">
                            @foreach ($bundles as $bund_id)
                                <option value="{{ $bund_id->id }}">{{ $bund_id->name }} - {{ $bund_id->price }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="delivery">Delivery</label><br>
                        <select name="delivery">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label><br>
                        <select name="status">
                            <option value="pending">Pending</option>
                            <option value="on process">On Process</option>
                            <option value="done">Done</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-sm btn-success my-2">
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection

@push('custom_js')

@endpush
