@extends('layouts.app')

@section('title')
    Contact Us
@endsection

@section('content')
    <div class="my-5  flex-column w-1/2 mb-5">
        <div class="mb-3 pt-0">
            <input type="text" placeholder="Full Name"
                class="px-3 py-3 placeholder-gray-400 border border-b-black text-gray-700 relative bg-white bg-white rounded text-sm  focus:outline-none focus:-outline w-full" />
        </div>
        <div class="mb-3 pt-0">
            <input type="text" placeholder="Email Address"
                class="px-3 py-3 placeholder-gray-400 border border-b-black  text-gray-700 relative bg-white bg-white rounded text-sm  focus:outline-none focus:-outline w-full" />
        </div>
        <div class="mb-3 pt-0">
            <input type="text" placeholder="Subject"
                class="px-3 py-3 placeholder-gray-400 border border-b-black  text-gray-700 relative bg-white bg-white rounded text-sm  focus:outline-none focus:-outline w-full" />
        </div>
        <div class="mb-3 pt-0">
            <textarea placeholder="Message" rows="10"
                class="px-3 py-3 placeholder-gray-400 border border-b-black  text-gray-700 relative bg-white bg-white rounded text-sm  focus:outline-none focus:-outline w-full""></textarea>
                                                                                    </div>
                                                                        <button class=" bg-au-green text-white text-xs p-2
                mb-5">Submit</button>
            </div>
@endsection
