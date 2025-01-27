<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: auto;
        }
        th, td {
            padding: 12px;
            border: 2px solid black;
        }
        th {
            background-color: white;
            color: black;
            font-weight: bold;
            text-transform: uppercase;
        }
        td {
            background-color: #f3e5f5;
            color: #333;
            text-align: center;
        }

        h1, h2 {
            text-align: center;
            color: #6a1b9a;

        }
    </style>
</head>
<body>

    @php
        $teacher=json_decode($timeData['teacher'],true);
        $subject=json_decode($timeData['subject'],true);
        $from=json_decode($timeData['from'],true);
        $to=json_decode($timeData['to'],true);
    @endphp
    <table>
        <thead>
            <tr>
                <th colspan="5" class="d-flex"> <h1 style="margin: 0;padding: 0">Timetable  Class: {{$timeData->class}}</h1> </th>
            </tr>
            <tr>
                <th>#</th>
                <th>Teacher Name</th>
                <th>Subject</th>
                <th>From Time</th>
                <th>To Time</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($teacher as $key=> $value)
            @php

                $teacherName=DB::table('users')->where('id','=',$value)->value('name');
            @endphp
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$teacherName}}</td>
                <td>{{$subject[$key]}}</td>
                <td>{{$from[$key]}}</td>
                <td>{{$to[$key]}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
