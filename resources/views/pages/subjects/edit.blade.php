@extends('layouts.appp')
@section('title')
    {{ trans('Subjects_trans.edit_Subject') }}
@endsection
@section('pagetitle')
    {{ trans('Subjects_trans.edit_Subject') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ trans('Subjects_trans.edit_Subject') }}
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <div id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="p-1">
                                    <form method=POST id="addSubject" action="{{ route('subjects.update', $subject->id) }}"
                                        autocomplete="off">
                                        @csrf
                                        {{ method_field('patch') }}
                                        <input id="id" type="hidden" name="id" class="form-control"
                                            value="{{ $subject->id }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="Name"
                                                        class="form-label">{{ trans('Subjects_trans.subject_name_ar') }}</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $subject->getTranslation('name', 'ar') }}" name="name[ar]"
                                                        id="name">
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='name_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="Name_en"
                                                        class="form-label">{{ trans('Subjects_trans.subject_name_en') }}</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $subject->getTranslation('name', 'en') }}"
                                                        name="name[en]" id="name_en">
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='name_en_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="grade_id"
                                                        class="form-label">{{ trans('Subjects_trans.nomGrade') }}</label>
                                                    <select id="grade_id" name="grade_id" onchange="getTeachers()"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">
                                                       
                                                        @foreach ($grades as $grade)
                                                            <option
                                                                {{ $subject->grade_id == $grade->id ? 'selected' : '' }}
                                                                value="{{ $grade->id }}">{{ $grade->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='grade_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="classe_id"
                                                        class="form-label">{{ trans('Subjects_trans.nomClasse') }}</label>
                                                    <select id="classe_id" name="classe_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">
                                                        <option selected value="{{ $subject->classe_id }}">
                                                            {{ $subject->classe->nomClasse }}
                                                        </option>
                                                        {{-- à remplir par ajax --}}

                                                    </select>
                                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                                    <small id='classe_id_error' class="form-text text-danger"></small>
                                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                                </div>
                                            </div>
                                            <!--end col-->
                                            {{-- <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="teacher_id"
                                                        class="form-label">{{ trans('Subjects_trans.nomTeacher') }}</label>
                                                    <select id="teacher_id" name="teacher_id"
                                                        class="form-select form-control mb-3 bg-light "
                                                        aria-label="Default select example">
                                                        <option selected disabled>
                                                            {{ trans('Subjects_trans.ChoisirTeacher') }}
                                                        </option>
                                                        @foreach ($teachers as $teacher)
                                                            <option
                                                                {{ $subject->teacher_id == $teacher->id ? 'selected' : '' }}
                                                                value="{{ $teacher->id }}">{{ $teacher->name }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                            {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                            {{-- <small id='teacher_id_error' class="form-text text-danger"></small> --}}
                                            {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                            {{-- </div>
                                            </div> --}}
                                            <!--end col-->

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="teacher_id"
                                                        class="form-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                                    <select multiple id="teacher_id" name="teacher_id[]"
                                                        class="form-select js-example-basic-multiple form-control mb-3 bg-light nameTeacher"
                                                        aria-label="Default select example">
                                                        @foreach ($subject->teachers as $teacher)
                                                            <option selected value="{{ $teacher['id'] }}">
                                                                {{ $teacher['name'] }}</option>
                                                        @endforeach

                                                        @foreach ($teachers as $teacher)
                                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->

                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">

                                                <button type="submit" id="btnSave"
                                                    class="btn btn-success">{{ trans('Subjects_trans.submit') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <!-- listjs init -->
    <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/sweetalert.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#teacher_id').select2
        });

        function getTeachers() {
            // Récupérer la valeur sélectionnée dans l'input select nameGrade-1
            var selectedGrade = document.getElementById("grade_id").value;
            var langueActive = $('html').attr('lang');

            // Envoyer une requête AJAX pour récupérer les enseignants correspondants à la sélection de l'utilisateur
            $.ajax({
                type: "POST",
                url: "/teachers/" + selectedGrade,
                data: {
                    grade_id: selectedGrade
                },

                success: function(data) {
                    // Mettre à jour l'input select teacher_id avec les enseignants correspondants
                    var teacherSelect = document.getElementById("teacher_id");
                    var currentTeacherIds = Array.from(document.querySelectorAll('#teacher_id option:checked'))
                        .map(option => option.value);
                    teacherSelect.innerHTML = ""; // Supprimer les options existantes

                    for (var i = 0; i < data.length; i++) {
                        var option = document.createElement("option");
                        if (langueActive == 'ar') {
                            option.text = data[i].name.ar;
                        } else {
                            option.text = data[i].name.en;
                        }
                        option.value = data[i].id;
                        console.log(currentTeacherIds.includes(data[i].id.toString()));

                        // Si cet enseignant est déjà sélectionné, le marquer comme sélectionné dans l'input teacher_id
                        if (currentTeacherIds.includes(data[i].id.toString())) {
                            option.selected = true;
                        }

                        teacherSelect.add(option);
                    }

                }
            });
        }
    </script>
@endsection