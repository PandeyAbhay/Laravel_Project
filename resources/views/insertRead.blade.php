
@extends('welcome')
@section('content')
<center>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-danger fw-bold fs-4 rounded-pill mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Add Record
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">CRUD</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="insertData" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <input type="text" name="pname" id="" placeholder="Enter product name" class="form-control">
                </div>
                <div class="mb-2">
                    <input type="text" name="pprice" id="" placeholder="Enter product price" class="form-control">
                </div>
                <div class="mb-2">
                    <input type="file" name="image" id=""  class="form-control">
                </div>
                <button type="submit" class="btn btn-outline-danger fw-bold fs-4 rounded-pill">Add Record</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

</center>

<div class="container">
    <table class="table mt-5">
        <thead class="bg-danger text-white fw-bold">
           
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Price</th>
           <th>Product Image</th>
           <th>Update</th>
           <th>Delete</th>
           
        </thead>
        <tbody class="text-danger bg-light fs-4">
            @foreach($data as $item)
            <tr>
                <form action="updatedelete" method="get">
                <td class="pt-5"><input type="hidden" name="id" value="{{$item['Id']}}">{{$item['Id']}}</td>
                <td class="pt-5"><input type="hidden" name="name" value="{{$item['PName']}}">{{$item['PName']}}</td>
                <td class="pt-5"><input type="hidden" name="price" value="{{$item['PPrice']}}">{{$item['PPrice']}}</td>
                <td class="pt-5"><img src="images/{{$item['PImage']}}" height="100px" width="100px" alt=""></td>
                <td class="pt-5"><input type="submit" value="Update" class="btn btn-outline-primary rounded" name="update"></td>
                <td class="pt-5"><input type="submit" value="Delete" class="btn btn-outline-danger rounded" name="delete"></td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


@endsection