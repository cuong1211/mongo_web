@extends('layout.index')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            @if (isset($start_date) && isset($end_date))
                                <div class="d-flex align-items-center position-relative my-1">
                                    <div class="fs-4 text-dark fw-bolder">Sale Report From
                                        <span class="text-primary">{{ date('d-m-Y', strtotime($start_date)) }}</span> To <span class="text-primary">{{ date('d-m-Y', strtotime($end_date)) }}</span>
                                    </div>
                                </div>
                            @else
                                <div class="d-flex align-items-center position-relative my-1">
                                    <div class="fs-4 text-dark fw-bolder">Sale Report From <span class="text-primary"> {{date('d-m-Y', strtotime($now))}}</span></div>
                                </div>
                            @endif
                            <!--end::Search-->
                        </div>

                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <!--begin::Filter-->
                                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Filter
                                </button>
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                                    id="kt-toolbar-filter">
                                    <form action="{{ route('statistic.report') }}" method="GET">
                                        <!--begin::Header-->
                                        <div class="px-7 py-5">
                                            <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Separator-->
                                        <div class="separator border-gray-200"></div>
                                        <!--end::Separator-->
                                        <!--begin::Content-->
                                        <div class="px-7 py-5">
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fs-5 fw-bold mb-3">Start date:</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="date" name="start_date" class="form-control form-control-solid">
                                                <!--end::Input-->
                                            </div>
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fs-5 fw-bold mb-3">End date:</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="date" name="end_date" class="form-control form-control-solid">
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->

                                            <!--end::Input group-->
                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-end">
                                                <button type="reset" class="btn btn-light btn-active-light-primary me-2"
                                                    data-kt-menu-dismiss="true"
                                                    data-kt-customer-table-filter="reset">Reset</button>
                                                <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true"
                                                    data-kt-customer-table-filter="filter">Apply</button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                    </form>
                                    <!--end::Content-->
                                </div>
                                <!--end::Menu 1-->
                                <!--end::Filter-->
                                <!--begin::Add customer-->
                                
                                <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-customer-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-customer-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                
                                    <th class="min-w-125px">Date</th>
                                    <th class="min-w-125px">Product</th>
                                    <th class="min-w-125px">Quantity</th>
                                    <th class="min-w-125px">Price</th>
                                    <th class="min-w-125px">Total</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                <?php 
                                    $grandtotal = 0;
                                    $grandquantity = 0;
                                ?>
                                @foreach ($order as $item)
                                <?php 
                                    $grandquantity = count($order); ;
                                    $grandtotal += $item->total;
                                ?>
                                    <tr>
                                        <td class="text-left">{{ date('d-m-Y', strtotime($item->date)) }}</td>
                                        <td>
                                            {{ $item->product->name }}
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            {{ $item->product->price }}
                                        <td>
                                            {{ $item->total }} VNĐ
                                        </td>
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="min-w-125px ">Date</td>
                                    <td class="min-w-125px text-end">Total Quantity: </td>
                                    <td class="min-w-125px">{{ $grandquantity}}</td>
                                    <td class="min-w-125px text-end">Total:</td>
                                    <td class="min-w-125px ">{{$grandtotal}} VNĐ</td>
                                    {{-- <td>{{ $total }}</td> --}}
                                </tr>
                            </tfoot>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--begin::Modals-->
                <!--begin::Modal - Customers - Add-->
                <!--end::Modal - Customers - Add-->
                <!--end::Modals-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
{{-- @push('jscustom')
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/apps/user-management/users/list/table.js"></script>
    @include('pages.inproduct.js')
@endpush --}}
