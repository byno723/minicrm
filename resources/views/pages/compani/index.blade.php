@extends('layouts.appadmin')
@section('title')
    Mini-Crm
@endsection
@push('addonn-style')


<link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush

@section('konten')
<section class="content">
    <div class="row">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
        <div class="col-12 mt-4">
          <button type="button" class="btn btn-dark" data-toggle="modal"
          data-target="#dark-header-modal">Tambah Data</button>
          <br><br>
         
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Company</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name </th>
                  <th>Email</th>
                  <th>Logo</th>
                  <th>Aksi</th>
                 
                </tr>
                </thead>
                <tbody>
                    @forelse ($compani as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>
                            {{ $item->email }}
                        </td>
                        <td>
                            <img src="{{ Storage::url($item->logo) }}" alt="" width="100" height="100">
                                
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#editMenuModal{{ $item->id }}">
                            Edit
                        </button>

                          <form action="{{ route('compani.destroy', $item->id) }}" method="POST" class="inline-block">
                            {!! method_field('delete') . csrf_field() !!}
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>

                          </td>
                       
                      </tr>
                    @empty
                    <td colspan="4" class="border text-center">
                        Data Tidak Ditemukan
                    </td>
                    @endforelse
               
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>
</div>



    
   
<div id="dark-header-modal" class="modal fade" tabindex="-1" role="dialog"
aria-labelledby="dark-header-modalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header modal-colored-header bg-dark">
            <h4 class="modal-title" id="dark-header-modalLabel">Tambah Data</h4>
            <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <form action="#" class="pl-3 pr-3" action="{{ route('compani.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control" type="text" id="" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" value="{{ old('email') }}" class="form-control" id="nametext" name="email" >
                  
                </div>
                
             

                <div class="form-group">
                    <label for="">Logo</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input  name="logo" type="file" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light"
                data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-dark">Save </button>
        </div>
          
    </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    



@foreach ($compani as $item)
    

<!-- editMenuModal -->
<div class="modal fade" id="editMenuModal{{$item->id}}" tabindex="-1" aria-labelledby="editMenuModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMenuModalLabel">Edit data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="w-full" action="{{ route('compani.update', $item->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="{{$item->id}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" value="{{ old('name') ?? $item->name }}" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="3892">
                      
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" value="{{ old('email') ?? $item->email }}" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="3892">
                      
                    </div>
                    
                    <div class="form-group">
                        <label for="">Logo</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input  name="logo" type="file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    </div> 
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection

@push('addonn-script')
    
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
    $(function () {
      $("#example1").DataTable();
     
    });
  </script>
@endpush

