@extends('layouts.main')

@section('title', 'Subscribe | ' . Auth::user()->username)

@section('content')
    <div class="w-full lg:w-4/5 flex flex-col items-center lg:ml-[20%] mt-6">
        <x-paddle-button :url="$payLink" class="px-8 py-4">Monthly</x-paddle-button>
        <x-paddle-button :url="$payLinkSix" class="px-8 py-4">Six</x-paddle-button>
    </div>

    Next payment: {{ $nextPayment->amount() }} due on {{ $nextPayment->date()->format('d/m/Y') }}

    <table>
    @foreach ($receipts as $receipt)
        <tr>
            <td>{{ $receipt->paid_at->toFormattedDateString() }}</td>
            <td>{{ $receipt->amount() }}</td>
            <td><a href="{{ $receipt->receipt_url }}" target="_blank">Download</a></td>
        </tr>
    @endforeach
</table>
@endsection