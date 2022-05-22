@extends('acp.layout')
@section('content')
 <div class="container mx-auto text-white text-center">
     <div class="posts p-4 text-white">
         <h2 class="text-2xl">{{$user->name}} posts </h2>
         <canvas id="postsStats">

         </canvas>
     </div>
 </div>
 <script>
     const ctx = document.getElementById('postsStats').getContext('2d');
     const myChart = new Chart(ctx, {
         type: 'line',
         color: 'white',
         data: {
             labels: {!! $days !!},
             datasets: [{
                 label: 'Posts counts',
                 data:{!! $count !!},
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                 ],
                 borderWidth: 2,
                 tension: 0.3,
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             },
         }
     });
 </script>
@endsection
