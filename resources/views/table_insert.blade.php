<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="putdata" method="post">
    <div> 
        <select name="week" id="week">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>
    <div> 
         <select name="day" id="day">
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
            </select>
        </div>
        <div> 
                <select name="excercise" id="excercise">
                       <option disabled selected>Select Excercise</option>
                       @if(count($data) > 0)
                       @foreach ($data as $value)
                <option value="{{$value->excercise_name}}">{{$value->excercise_name}}</option>  
                       @endforeach
                       @else
                           <option>no data found</option>
                       @endif
                   </select>
               </div>
               <div> 
                    <select name="block" id="block">
                           <option value="0">No</option>
                           <option value="1">Yes</option>                           
                       </select>
                   </div>
               <br>
               <input type="hidden" name="_token" value="{{csrf_token() }}">   
               <div>
                    <button type="submit">Register</button>
               </div>
               <table>
                   <tr>
                       <th>No</th>
                       <th>Trainer id</th>
                   <th>{{$img}}</th>
                   </tr>
               </table>
            </form>
</body>
</html>