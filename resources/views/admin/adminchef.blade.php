<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    @include('admin.css')

    <style type="text/css">

        .title_deg
        {

            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;

        }

        .div_deg
        {

            text-align: center;
            padding: 15px;

        }

        label
        {

            display: inline-block;
            width: 100px;

        }

        th,td
        {

            padding: 10px; 
            font-size: 15px; 
            color: white; 
            border: 1px solid; 
            width: 125px;

        }

        .table_deg
        {

            border: 1px solid white;
            width: %80;
            text-align: center;
            margin-left: 10px;

        }

        .th_deg
        {

            background-color: grey;

        }

        .img_deg
        {

            height: 100px;
            width: 100px;

        }

    </style>
    
  </head>
  <body>
    <div class="container-scroller">
    
        @include('admin.navbar')

        <div style="position:relative; margin:0 auto; clear:left; height:auto; z-index: 0; text-align:center;">

            <h1 class="title_deg">Add Chef</h1>

            <form action="{{url('add_chef')}}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="div_deg">
                    <label>Name : </label>
                    <input style="color: black;" type="text" name="name" placeholder="Chef's Name" required>
                </div>

                <div class="div_deg">
                    <label>Speciality : </label>
                    <input style="color: black;" type="text" name="speciality" placeholder="Speciality" required>
                </div>

                <div class="div_deg">
                    <label>Image : </label>
                    <input type="file" name="image" required>
                </div>

                <div class="div_deg">
                    <input type="submit" value="Save" class="btn btn-success">
                </div>

            </form>

            <div style="padding-bottom: 15px;">
            
                <h1 class="title_deg">All Foods</h1>
    
    
                <table class="table_deg">
    
                    <tr class="th_deg">
    
                        <th>Name</th>
                        <th>Speciality</th>
                        <th>Image</th>
                        <th>Action</th>
                        <th>Action 2</th>
    
                    </tr>
    
                    @foreach ($data as $data)

                    <tr>
    
                        <td>{{$data->name}}</td>
                        <td>{{$data->speciality}}</td>
                        <td><img class="img_deg" src="/chefimage/{{$data->image}}"></td>
    
                        <td><a href="{{url('delete_chef', $data->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This Chef?')">Delete</a></td>

                        <td><a href="{{url('updatechef_view', $data->id)}}" class="btn btn-warning">Update</a></td>
    
                    </tr>

                    @endforeach
    
                </table>
    
            </div>


        </div>

        

    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>