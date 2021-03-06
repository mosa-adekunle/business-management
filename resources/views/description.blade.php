<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Business Management</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
       
        <link rel="stylesheet" href="{{ asset('/css/normalize.css') }}">        
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    </head>
    <body class="antialiased">
        <h1>Business Management API</h1>
              
        <h2>End points </h2>
        <ul>
            <li>GET /get-businesses</li>
            <li>GET /get-businesses/{number_of_records_per_page}</li>
            <li>GET /get-business/{id}</li>
            <li>POST /store-business</li>
            <li>PUT /update-business/{id}</li>
            <li>DELETE /delete-business/{id}</li>
        </ul>

    </body>
</html>
