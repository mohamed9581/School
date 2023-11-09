    <div class="modal fade " id="edit{{ $teacher->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="p-3">
                    <form method=POST id="updateTeacher" action="{{ route('teachers.update', $teacher->id) }}"
                        autocomplete="off">
                        {{ method_field('patch') }}

                        @csrf
                        <input type="hidden" name="id" value="{{ $teacher->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Name"
                                        class="form-label">{{ trans('Teacher_trans.Name_ar') }}</label>
                                    <input type="text" class="form-control"
                                        value="{{ $teacher->getTranslation('name', 'ar') }}" name="name[ar]"
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
                                        class="form-label">{{ trans('Teacher_trans.Name_en') }}</label>
                                    <input type="text" class="form-control"
                                        value="{{ $teacher->getTranslation('name', 'en') }}" name="name[en]"
                                        id="name_en">
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='name_en_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ trans('Teacher_trans.Email') }}</label>
                                    <input type="email" class="form-control" value="{{ $teacher->email }}"
                                        name="email" id="email" autocomplete="off">
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='email_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="specialisation_id"
                                        class="form-label">{{ trans('Teacher_trans.specialisation') }}</label>
                                    <select id="specialisation_id" name="specialisation_id"
                                        class="form-select form-control mb-3 bg-light "
                                        aria-label="Default select example">
                                        @foreach ($listeSpecialisations as $specialisation)
                                            <option
                                                {{ $teacher->specialisations->id == $specialisation->id ? 'selected' : '' }}
                                                value="{{ $specialisation->id }}">{{ $specialisation->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='specialisation_id_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gender_id"
                                        class="form-label">{{ trans('Teacher_trans.Gender') }}</label>
                                    <select id="gender_id" name="gender_id"
                                        class="form-select form-control mb-3 bg-light "
                                        aria-label="Default select example">

                                        @foreach ($listeGenders as $gender)
                                            <option {{ $teacher->genders->id == $gender->id ? 'selected' : '' }}
                                                value="{{ $gender->id }}">{{ $gender->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='gender_id_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dateEmbauche"
                                        class="form-label">{{ trans('Teacher_trans.Joining_Date') }}</label>
                                    <input type="date" class="form-control" value="{{ $teacher->joining_Date }}"
                                        name="joining_Date" id="joining_Date">
                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='joining_Date_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="grade_id" class="form-label">{{ trans('Teacher_trans.grade') }}</label>
                                    <select id="grade_id" name="grade_id"
                                        class="form-select form-control mb-3 bg-light "
                                        aria-label="Default select example">
                                        @foreach ($listeGrades as $grade)
                                            <option {{ $teacher->grade->id == $grade->id ? 'selected' : '' }}
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
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="addresse"
                                        class="form-label">{{ trans('Teacher_trans.Address') }}</label>
                                    <textarea class="form-control" name="addresse" id="addresse" rows="1">{{ $teacher->addresse }}</textarea>

                                    {{-- ---------------------debut pour afficher l'erreur------------------------ --}}
                                    <small id='adresse_error' class="form-text text-danger"></small>
                                    {{-- ---------------------fin pour afficher l'erreur------------------------ --}}
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light"
                                    data-bs-dismiss="modal">{{ trans('Teacher_trans.Close') }}</button>
                                <button type="submit" id="btnSave"
                                    class="btn btn-success">{{ trans('Teacher_trans.Edit_Teacher') }}</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
