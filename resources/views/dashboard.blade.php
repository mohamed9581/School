@extends('layouts.appp')
@section('title')
    {{ trans('main_trans.Dashboard') }} Administrateur
@endsection
@section('pagetitle')
    {{ trans('main_trans.Dashboard') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">{{ trans('main_trans.sections') }}</p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                    data-target="{{ App\Models\Section::count() }}">{{ App\Models\Section::count() }}</span>
                            </h2>

                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                    <i class="fas fa-chalkboard text-danger"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-3">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">{{ trans('main_trans.students') }}</p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                    data-target="{{ App\Models\Student::count() }}">{{ App\Models\Student::count() }}</span>
                            </h2>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                    <i class="fas fa-user-graduate text-success"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-md-3">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">{{ trans('main_trans.teachers') }}</p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                    data-target="{{ App\Models\Teacher::count() }}">{{ App\Models\Teacher::count() }}</span>
                            </h2>

                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                    <i class="fas fa-chalkboard-teacher text-warning"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-3">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">{{ trans('main_trans.Parents') }}</p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                    data-target="{{ App\Models\MyParent::count() }}">{{ App\Models\MyParent::count() }}</span>
                            </h2>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                    <i class="fas fa-user-tie text-primary"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
    <div class="row">
        <div class="col-xxl-12">
            <h5 class="mb-3 text-primary text-bold">{{ trans('main_trans.lastOperation') }}</h5>
            <div class="card">

                <div class="card-body">

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-customs nav-danger mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#border-navs-home"
                                role="tab">{{ trans('main_trans.students') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#border-navs-profile"
                                role="tab">{{ trans('main_trans.teachers') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#border-navs-messages"
                                role="tab">{{ trans('main_trans.Parents') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#border-navs-settings"
                                role="tab">{{ trans('main_trans.invoices') }}</a>
                        </li>


                    </ul><!-- Tab panes -->

                    <div class="tab-content text-muted">
                        {{-- students Table --}}
                        <div class="tab-pane active" id="border-navs-home" role="tabpanel">

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="studentTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th>N°</th>
                                            <th class="sort" data-sort="name">{{ trans('Students_trans.Name') }}
                                            </th>
                                            <th>{{ trans('Students_trans.Email') }}</th>
                                            <th>{{ trans('Students_trans.Gender') }}</th>
                                            <th>{{ trans('Students_trans.Grade') }}</th>
                                            <th>{{ trans('Students_trans.classrooms') }}</th>
                                            <th>{{ trans('Students_trans.section') }}</th>
                                            <th>{{ trans('main_trans.dateOperation') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="studentBody">
                                        @foreach ($data['students'] as $index => $student)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->gender->name }}</td>
                                                <td>{{ $student->grade->Name }}</td>
                                                <td>{{ $student->classe->nomClasse }}</td>
                                                <td>{{ $student->section->nomSection }}</td>
                                                <td>{{ $student->created_at }}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @if ($data['students'] && $data['students']->count() == 0)
                                    <div class="noresult">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h5 class="mt-2">{{ trans('main_trans.nowData') }}</h5>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>

                        {{-- teachers Table --}}

                        <div class="tab-pane" id="border-navs-profile" role="tabpanel">

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="teacherTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th>N°</th>
                                            <th class="sort" data-sort="name">{{ trans('Teacher_trans.Name_Teacher') }}
                                            </th>
                                            <th>{{ trans('Teacher_trans.Gender') }}</th>
                                            <th>{{ trans('Teacher_trans.Joining_Date') }}</th>
                                            <th>{{ trans('Teacher_trans.specialisation') }}</th>
                                            <th>{{ trans('main_trans.dateAddition') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="teacherBody">
                                        @foreach ($data['teachers'] as $index => $teacher)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $teacher->name }}</td>
                                                <td>{{ $teacher->genders->name }}</td>
                                                <td>{{ $teacher->joining_Date }}</td>
                                                <td>{{ $teacher->specialisations->name }}</td>
                                                <td>{{ $teacher->created_at }}</td>

                                            </tr>


                                            <!-- delete_modal_Teacher -->
                                        @endforeach

                                    </tbody>
                                </table>
                                @if ($data['teachers'] && $data['teachers']->count() == 0)
                                    <div class="noresult">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h5 class="mt-2">{{ trans('main_trans.nowData') }}</h5>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="tab-pane" id="border-navs-messages" role="tabpanel">

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="gradeTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th>N°</th>
                                            <th>{{ trans('Parent_trans.name_tuteur') }}</th>
                                            <th class="sort" data-sort="email">{{ trans('Parent_trans.Email') }}</th>
                                            <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
                                            <th>{{ trans('Parent_trans.Phone_Father') }}</th>
                                            <th>{{ trans('main_trans.dateAddition') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="parentBody">
                                        @foreach ($data['parents'] as $index => $myParent)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $myParent->name_Father }}</td>
                                                <td>{{ $myParent->email }}</td>
                                                <td>{{ $myParent->cin_Father }}</td>
                                                <td>{{ $myParent->phone_Father }}</td>
                                                <td>{{ $myParent->created_at }}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @if ($data['parents'] && $data['teachers']->count() == 0)
                                    <div class="noresult">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h5 class="mt-2">{{ trans('main_trans.nowData') }}</h5>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane" id="border-navs-settings" role="tabpanel">
                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="feesInvoicesTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="table-info" scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th class="table-info">N°</th>
                                            <th class="table-info" title="{{ trans('Fees_trans.invoice_date') }}">
                                                {{ trans('Fees_trans.invoice_date') }}</th>
                                            <th class="sort table-info" data-sort="name">
                                                {{ trans('Students_trans.Name') }}
                                            </th>
                                            <th class="table-info" title="{{ trans('Fees_trans.grade') }}">
                                                {{ trans('Fees_trans.grade') }}</th>
                                            <th class="table-info" title="{{ trans('Fees_trans.classe') }}">
                                                {{ trans('Fees_trans.classe') }}</th>
                                            <th class="table-info" title="{{ trans('Fees_trans.fee_type') }}">
                                                {{ trans('Fees_trans.fee_type') }}</th>
                                            <th class="table-info" title="{{ trans('Fees_trans.amount') }}">
                                                {{ trans('Fees_trans.amount') }}</th>
                                            <th class="table-info">{{ trans('main_trans.dateAddition') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="studentBody">

                                        @foreach ($data['fees'] as $index => $fee_invoice)
                                            <tr>
                                                <td scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </td>
                                                <td>{{ $index = $index + 1 }}</td>
                                                <td>{{ $fee_invoice->invoice_date }}</td>
                                                <td>{{ $fee_invoice->student->name }}</td>
                                                <td>{{ $fee_invoice->grade->Name }}</td>
                                                <td>{{ $fee_invoice->classe->nomClasse }}</td>
                                                <td>{{ $fee_invoice->fee->title }}</td>
                                                <td>{{ $fee_invoice->amount }}</td>
                                                <td>{{ $fee_invoice->created_at }}</td>
                                                @include('pages.fees_invoices.delete_one')
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if ($data['fees'] && $data['fees']->count() == 0)
                                    <div class="noresult">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h5 class="mt-2">{{ trans('main_trans.nowData') }}</h5>
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                </div><!-- end card-body -->
            </div>
        </div>
        <!--end col-->
    </div>

    <livewire:calendar />
    @livewireScripts
    @stack('scripts')
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <!-- listjs init -->
    <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        // :::::::::::::::cette ligne pour obtenir l'url du site::::::::::::::
        var SITEURL = '{{ URL::to('') }}';
        var update = false;
    </script>
@endsection
