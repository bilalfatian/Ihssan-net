@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1><strong>{{ $campaign->title }}</strong></h1>
    </div>

    <div class="mt-3">
    </div>

    <div class="row">
        <div class="col-8">
            <div class="card shadow border-0">
                <img src="{{ asset('storage/images/' . $campaign->image) }}" alt="Campaign image" class="img-responsive">
                <div class="card-img-overlay">
                    <span class="badge rounded-pill bg-light" style="font-size:1rem; color:green;">&nbsp;<i class="bi bi-tags"></i>&nbsp;&nbsp;{{  $campaign->category->name }}</span>
                </div>   
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                        <h5 class="mt-1" style="font-size: 0.9rem; color: green;">&nbsp;&nbsp;<i class="bi bi-calendar green-icon"></i>&nbsp;&nbsp;Created <strong>{{ $campaign->created_at->diffForHumans() }}</strong></h5>
                        </div>
                        <div class="col-sm">
                        </div>
                        <div class="col-sm">
                        </div>                             
                        <div class="col-sm">
                        </div>                       
                    </div>
                </div>
            </div>

            <div class="mt-3">
            </div>

            <div class="card shadow border-0">

            </div>

            <div class="mt-3">
            </div>

            <div class="card shadow border-0">
                <div class="card-body">
                    <h3><strong><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;Organizer</strong></h3>
                    <h5 class="mt-3">&nbsp;&nbsp;<i class="bi bi-person"></i>&nbsp;&nbsp;{{  $campaign->publisher->first_name }} {{ $campaign->publisher->last_name }}</h5>
                    <h5 class="mt-3">&nbsp;&nbsp;<i class="bi bi-envelope"></i>&nbsp;&nbsp;{{  $campaign->publisher->email }}</h5>
                </div>
            </div>
   
            <div class="mt-3">
            </div>

            <div class="card shadow border-0">
                <div class="card-body">
                    <h3><strong><i class="bi bi-exclamation-circle"></i>&nbsp;&nbsp;About this campaign</strong></h3>
                    <p class="mt-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $campaign->description }}</p>
                </div>
            </div>

            <div class="mt-3">
            </div>

            <div class="card shadow border-0">
                <div class="card-body">
                <h3><strong><i class="bi bi-chat-right-text"></i>&nbsp;&nbsp;Comments</strong></h3>
                <div class="mt-4">
                </div>
                @foreach ($donations as $donation)
                @if(!empty($donation->comment))
                    <div class="row">
                        <div class="col-8">
                            <h5>&nbsp;&nbsp;<i class="bi bi-person-circle green-icon" style="font-size: 2.1rem; vertical-align: top;"></i><strong>&nbsp;&nbsp;&nbsp;{{ $donation->user->first_name }} {{ $donation->user->last_name }}</strong></h5>
                            <p style="margin-top: -20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $donation->comment }}</p>
                        </div>
                        <div class="col-4">
                            <div class="text-muted">
                                    <p style = "font-size: 12px;text-align:right">{{$donation->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="mt-2">
                </div>
                @endforeach
                </div>
            </div>

        </div>

        <div class="col-4">
                <div class="card shadow border-0">
                <div class="d-grid gap-3">
                    <div class="text-center">
                        <div class="p-2">
                            <div class="mt-3">                                                                  
                            <img style="width: 150px; height: 30px; opacity: .4;" src="{{ asset('storage/images/LOGO-gray.png') }}" width="185" height="50" class="d-inline-block align-top" alt="IhsanNET">
                            </div>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="card-body">
                            <div class="text-center">
                                <h1 class="raised-money" id="raised-money"><strong>${{ number_format($campaign->raised_money,0) }}</strong></h1>
                                <div class="text-muted">
                                    <p class="h5">raised of ${{number_format($campaign->needed_money,0) }}</p>
                                </div>
                            </div>
                            <div class="mt-3">                                                                  
                            </div>
                            <div class="text-center">
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($campaign->raised_money / $campaign->needed_money) * 100 }}%;" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="text-center" style="font-size: 0.6rem;">
                                    <div class="text-muted">
                                        <p class="h5"><strong>{{ $campaign->donations->count() }}</strong> donations</p>
                                    </div>
                                </div>
                            </div>
                
                            <div style="display: flex; justify-content: center; align-items: center;">
                                @if (Auth::user()->id == $campaign->publisher_id || Auth::user()->role == 'admin')
                                <div class="mt-3">
                                    <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-primary">Edit</a>
                                    <form method="POST" action="{{ route('campaigns.destroy', $campaign->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                            
                            <div style="display: flex; justify-content: center; align-items: center;">
                                @if ( Auth::user()->role == 'user' )
                                    <a href="{{ route('donations.create', $campaign->id) }}" class="btn btn-success btn-lg btn-block"><strong>DONATE NOW</strong></a>
                                @endif
                            </div>    

                            <div class="mt-3">
                            </div>
                        </div>
                    </div>
                    <div class="p-2" style="height: 30px;"></div>
                    </div>

                </div>

                <div class="mt-3"> 
                </div>

                <div class="card shadow border-0">
                    <div class="card-body">

                        <div class="text-center">
                            <h4><strong><i class="bi bi-cash-coin"></i>&nbsp;&nbsp;Recent Supporters</strong></h4>
                            <table class="table">
                                <tbody>
                                @foreach ($donations as $donation)
                                    <tr>
                                        <td>{{ $donation->user->first_name }} {{ $donation->user->last_name }}</td>
                                        <td>${{ number_format($donation->amount,0) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@include('layouts.footer')

@endsection

