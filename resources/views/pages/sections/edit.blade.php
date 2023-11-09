 {{-- :::::::::::::::::::::::::::debut modal edit::::::::::::::::::::::::::::::::::::::::::::::::::::::::: --}}
 <div class="modal fade editModal" id="edit{{ $section->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header bg-light p-3">
                 <h5 class="modal-title" id="exampleModalLabel"></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                     id="close-modal"></button>
             </div>
             <div class="p- modal-body" style="overflow:hidden;">
                 <form method=POST id="editSection" action="{{ route('sections.update', $section->id) }}"
                     autocomplete="off">
                     @csrf
                     {{ method_field('patch') }}
                     <input id="id" type="hidden" name="id" class="form-control"
                         value="{{ $section->id }}">

                     <div class="row">
                         <div class="col-md-6">
                             <div class="mb-3">

                                 <input type="text" class="form-control"
                                     value="{{ $section->getTranslation('nomSection', 'ar') }}" name="name[ar]"
                                     id="Name" placeholder="{{ trans('Sections_trans.Section_name_ar') }}">
                             </div>
                         </div>
                         <!--end col-->

                         <div class="col-md-6">
                             <div class="mb-3">
                                 <input type="text" class="form-control"
                                     value="{{ $section->getTranslation('nomSection', 'en') }}" name="name[en]"
                                     id="Name_en" placeholder="{{ trans('Sections_trans.Section_name_en') }}">
                             </div>
                         </div>
                         <!--end col-->
                     </div>
                     <!--end row-->
                     <div class="row">
                         <div class="col-md-12">
                             <div class="mb-3">
                                 <label for="grade_id"
                                     class="form-label">{{ trans('Sections_trans.Name_Grade') }}</label>
                                 <select id="nameGrade-1" name="grade_id"
                                     class="form-select form-control mb-3 bg-light nameGrade"
                                     aria-label="Default select example">
                                     @foreach ($listegrades as $grade)
                                         <option {{ $section->grades->id == $grade->id ? 'selected' : '' }}
                                             value="{{ $grade->id }}">{{ $grade->Name }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <!--end col-->
                     </div>
                     <!--end row-->
                     <div class="row">
                         <div class="col-md-12">
                             <div class="mb-3">
                                 <label for="grade_id"
                                     class="form-label">{{ trans('Sections_trans.nomClasse') }}</label>
                                 <select id="nameClasse-1" name="classe_id"
                                     class="form-select form-control mb-3 bg-light nameClasse"
                                     aria-label="Default select example">
                                     <option selected value="{{ $section->classes->id }}">
                                         {{ $section->classes->nomClasse }}
                                     </option>
                                 </select>
                             </div>
                         </div>
                         <!--end col-->
                     </div>
                     <!--end row-->
                     <div class="row">
                         <div class="col-md-12">
                             <div class="mb-3">
                                 <label for="grade_id"
                                     class="form-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                 <select multiple id="teacher_id_edit{{ $section->id }}" name="teacher_id[]"
                                     class="form-select js-example-basic-multiple form-control mb-3 bg-light nameTeacher"
                                     aria-label="Default select example">
                                     @foreach ($section->teachers as $teacher)
                                         <option selected value="{{ $teacher['id'] }}">{{ $teacher['name'] }}</option>
                                     @endforeach

                                     @foreach ($listeteachers as $teacher)
                                         <option value="{{ $teacher->id }}">{{ $teacher->name }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <!--end col-->
                     </div>
                     <!--end row-->

                     <div class="row">
                         <div class="col-md-12">
                             <div class="mb-3">

                                 <div class="form-check form-switch form-switch-success">
                                     <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3"
                                         {{ $section->status == 1 ? 'checked' : '' }} name='status'>
                                     <label class="form-check-label"
                                         for="SwitchCheck3">{{ trans('Sections_trans.Status') }}</label>
                                 </div>

                             </div>
                         </div>
                         <!--end col-->
                     </div>

                     <div class="modal-footer">
                         <div class="hstack gap-2 justify-content-end">
                             <button type="button" class="btn btn-light"
                                 data-bs-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                             <button type="submit" id="btnSave"
                                 class="btn btn-success">{{ trans('Sections_trans.edit_Section') }}</button>
                         </div>
                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>

 {{-- :::::::::::::::::::::::::::fin modal d'edit::::::::::::::::::::::::::: --}}
