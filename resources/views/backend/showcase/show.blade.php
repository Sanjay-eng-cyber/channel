@extends('backend.layouts.app')
@section('title', 'Showcase - ' . $showcase->name)
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-xl-4 col-md-6 mt-2 mb-1">
                            <legend class="h4">
                                Showcase Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Showcase Details</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info statbox widget box box-shadow">
                <div class="row widget-header">
                    <div class="col-md-11">
                        <div class="work-section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Showcase
                                                    Name</label><br>
                                                <p class="label-title">{{ $showcase->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Products List</label><br>
                                            </div>
                                        </div>
                                        <table class="table mb-4">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($showcaseProducts as $showcaseProduct)
                                                    {{-- @dd($showcase->products()->get()); --}}
                                                    <tr>
                                                        <td class="w-100">{{ $showcaseProduct->product->name }}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown custom-dropdown">
                                                                <a class="dropdown-toggle" href="#" role="button"
                                                                    id="dropdownMenuLink1" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-more-horizontal">
                                                                        <circle cx="12" cy="12" r="1">
                                                                        </circle>
                                                                        <circle cx="19" cy="12" r="1">
                                                                        </circle>
                                                                        <circle cx="5" cy="12" r="1">
                                                                        </circle>
                                                                    </svg>
                                                                </a>

                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuLink1">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('backend.showcaseproduct.destroy', $showcaseProduct->id) }}">Delete</a>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr class="">
                                                        <td colspan="2">No Records Found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="widget-content widget-content-area">

            </div> --}}
        </div>
    </div>
@endsection
@section('cdn')
    <link href="{{ asset('assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            let activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('a[href="' + activeTab + '"]').tab('show');
            }
        })
    </script>
    <link type=" text/css" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css" />
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('js/lg-zoom.min.js') }}"></script>
    {{-- <link rel="stylesheet" type=" text/css" href="{{ asset('css/lightgallery.css') }}">
        <script src="{{ asset('js/lightgallery.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            $("#lightgallery2").lightGallery({
                download: false,
                escKey: true,
                fullScreen: true,
            });
        });
    </script>
@endsection
<style>
    .lg-icon {
        background: transparent !important;
    }
</style>
