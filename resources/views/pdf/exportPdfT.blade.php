<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>transaction List</title>
   <style>
       html {
           font-size: 12px;
       }

       .table {
           border-collapse: collapse !important;
           width: 100%;
       }

       .table-bordered th,
       .table-bordered td {
           padding: 0.5rem;
           border: 1px solid black !important;
       }
   </style>
</head>
<body>
   <h1>transaction List</h1>
   <table class="table table-bordered">
       <thead>
           <tr>
               <th>No.</th>
               <th>transaction_code</th>
               <th>items</th>
               <th>prices</th>
               <th>method</th>
               <th>date</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($transactions as $index => $transaction)
               <tr>
                   <td align="center">{{ $index + 1 }}</td>
                   <td>{{ $transaction->transaction_code }}</td>
                   <td>{{ $transaction->items }}</td>
                   <td>{{ $transaction->prices}}</td>
                   <td align="center">{{ $transaction->method}}</td>
                   <td>{{ $transaction->date }}</td>
               </tr>
           @endforeach
       </tbody>
   </table>
</body>
</html>
