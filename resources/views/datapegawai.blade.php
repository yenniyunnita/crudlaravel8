@extends('layout.admin');
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container">
        <a href="/tambahpegawai" class="btn btn-success">Tambah +</a>

        <div class="row g-3 align-items-center mt-2">
              <div class="col-auto">
                <form action="/pegawai" method="GET">
                    <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline" placeholder="Search">
                </form>
              </div>

              <div class="col-auto">
                 <a href="/exportpdf" class="btn btn-info">Export PDF</a>
              </div>

           
        </div>
        <div class="row">
          <!-- @if($message= Session::get('success'))
          <div class="alert alert-success" role="alert">
            {{$message}}
          </div>
          @endif -->
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Aksi</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @php  
                    $no=1;
                  @endphp
                  @foreach($data as $index => $row)
                  <tr>
                    <th scope="row">{{$index + $data ->firstItem() }}</th>
                    <td>{{$row->nama}}</td>
                    <td>
                     <img src="{{asset('fotopegawai/'.$row->foto)}}" alt="" style="width:50px;">
                    </td>
                    <td>{{$row->jeniskelamin}}</td>
                    <td>0{{$row->notelp}}</td>
                    <td>{{$row->created_at->format('D M Y')}}</td>
                    <td>
                       
                        <a href="/tampilkandata/{{$row->id}}" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger delete" data-id="{{$row->id}}" data-nama="{{$row->nama}}">Delete</a>
                    </td>
                  </tr>
                  @endforeach

                
               
                </tbody>
              </table>
              {{ $data->links() }}
        </div>
    </div>
</div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- CDN JQUERY  minified untuk alert success-->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- SWEETALERT  import CDN  1-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- CDN TOASTTR JS untuk sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    $('.delete').click(function(){
    var pegawaiid = $(this).attr('data-id');
    var nama = $(this).attr('data-nama');
      swal({
        title: "Yakin?",
        text: "Kamu Akan Menghapus Data Pegawai Dengan Nama "+nama+" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location="/delete/"+pegawaiid+""
          swal("Data Berhasil Dihapus", {
            icon: "success",
          });
        } else {
          swal("Data Tidak Jadi Dihapus");
        }
      });
    });
   
  </script>
<script>
 
 @if (Session::has('success'))
      toastr.success("{{Session::get('success')}}")
  @endif
 
</script>











    @endsection