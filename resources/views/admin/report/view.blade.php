<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shakeelamart - Report</title>
  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
</style>
  
  </head>
  <body>
    <table class="table" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Gambar</th>
            <th>Dilihat</th>
        </tr>
    </thead>
    <tbody align="center">  
        @foreach ($produk as $p)
        <tr>
            <th scope="col">{{$loop->iteration}}</th>
             <td>{{$p->nama_produk}}</td>
             <td><img src="{{ URL::to('/')}}/public/images/produk/{{$p->gambar1}}" alt="" width="70px" class="img-thumbnail"></td>
             @if($p->dilihat != null)
              <td>{{$p->dilihat}}</td>
              @else
              <td>0</td>
              @endif
        </tr>
        @endforeach  
    </tbody>
    </table>
    
  </body>
</html>