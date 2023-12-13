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

    </style>
    
  </head>
  <body>
    <div class="container-scroller">
    
        @include('admin.navbar')

        <div style="position:relative; margin:0 auto; clear:left; height:auto; z-index: 0; text-align:center;">

            <div style="padding-bottom: 15px;">
            
                <h1 class="title_deg">All Reservations</h1>
    
    
                <table class="table_deg">
    
                    <tr class="th_deg">
    
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Guest</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Message</th>
    
                    </tr>
    
                    @foreach ($data as $data)

                    <tr>
    
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->guest}}</td>
                        <td>{{$data->date}}</td>
                        <td>{{$data->time}}</td>
                        <td>{{$data->message}}</td>
    
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