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

    </style>
    
  </head>
  <body>
    <div class="container-scroller">
    
        @include('admin.navbar')

        <div style="position:relative; margin:0 auto; clear:left; height:auto; z-index: 0; text-align:center;">

            <h1 class="title_deg">Add Food</h1>

            <form action="{{url('add_food')}}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="div_deg">
                    <label>Title : </label>
                    <input style="color: black;" type="text" name="title" placeholder="Write a title" required>
                </div>

                <div class="div_deg">
                    <label>Price : </label>
                    <input style="color: black;" type="number" name="price" placeholder="Price" required>
                </div>

                <div class="div_deg">
                    <label>Image : </label>
                    <input type="file" name="image" required>
                </div>

                <div class="div_deg">
                    <label>Description : </label>
                    <input style="color: black;" type="text" name="description" placeholder="Description" required>
                </div>

                <div class="div_deg">
                    <input type="submit" value="Save" class="btn btn-success">
                </div>

            </form>


        </div>
        

    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>