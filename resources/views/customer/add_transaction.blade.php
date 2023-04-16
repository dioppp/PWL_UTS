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
              <h3 class="card-title">Add Transaction</h3>

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
                        <label>Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" value="{{ isset($data)? $data->name : old('name')}}" name="name" type="text">
                        @error('name')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select name="shoe">
                            @foreach ($shoes as $shoe)
                                <option value="{{ $shoe->id }}">{{ $shoe->brand }} - {{ $shoe->color }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="bundle">
                            @foreach ($bundles as $bundle)
                                <option value="{{ $bundle->id }}">{{ $bundle->name }} - {{ $bundle->price }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control @error('price') is-invalid @enderror" value="{{ isset($data)? $data->price : old('price')}}" name="price" type="text">
                        @error('price')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
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