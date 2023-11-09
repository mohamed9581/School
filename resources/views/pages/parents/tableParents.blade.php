 <div class="card-body" id="showTable">
     <div id="customerList">
         <div class="row g-4 mb-3">
             <div class="col-sm-auto">
                 <div>
                     <button type="button" class="btn btn-success add-btn" id="create-btn"><i
                             class="ri-add-line align-bottom me-1"></i>
                         {{ trans('Parent_trans.add_parent') }}</button>
                     <button class="btn btn-soft-danger " id="SupprimerMulti"><i
                             class="ri-delete-bin-2-line"></i></button>
                     {{-- <button class="btn btn-soft-danger " onClick="deleteMultiple()"><i
                                                class="ri-delete-bin-2-line"></i></button> --}}
                 </div>
             </div>
             <div class="col-sm">
                 <div class="d-flex justify-content-sm-end">
                     <div class="search-box ms-2">
                         <input type="text" class="form-control search"
                             placeholder="{{ trans('pagination.search') }}">
                         <i class="ri-search-line search-icon"></i>
                     </div>
                 </div>
             </div>
         </div>

         <div class="table-responsive table-card mt-3 mb-1" id="tableParent">
             <table class="table align-middle table-nowrap">
                 <thead class="table-light">
                     <tr>
                         <th scope="col" style="width: 50px;">
                             <div class="form-check">
                                 <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                             </div>
                         </th>
                         <th>N°</th>
                         <th class="sort" data-sort="email">{{ trans('Parent_trans.Email') }}</th>
                         <th>{{ trans('Parent_trans.Name_Father') }}</th>
                         <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
                         <th>{{ trans('Parent_trans.Passport_ID_Father') }}</th>
                         <th>{{ trans('Parent_trans.Phone_Father') }}</th>
                         <th>{{ trans('Parent_trans.Job_Father') }}</th>
                         <th>{{ trans('Parent_trans.Processes') }}</th>
                     </tr>
                 </thead>
                 <tbody class="list form-check-all" id="parentBody">
                     @foreach ($myParents as $index => $myParent)
                         <tr>
                             <td scope="col" style="width: 50px;">
                                 <div class="form-check">
                                     <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                 </div>
                             </td>
                             <td>{{ $index = $index + 1 }}</td>
                             <td>{{ $myParent->email }}</td>
                             <td>{{ $myParent->name_Father }}</td>
                             <td>{{ $myParent->cin_Father }}</td>
                             <td>{{ $myParent->passeport_ID_Father }}</td>
                             <td>{{ $myParent->phone_Father }}</td>
                             <td>{{ $myParent->job_Father }}</td>
                             <td>
                                 {{-- <button class="editGrade btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal"
                                     wire:click="edit({{ $myParent->id }})">{{ trans('Grade_trans.edit_Grade') }}</button> --}}
                                 {{-- <button grade_id="{{ $grade->id }}"
                                     class="deleteGrade btn btn-sm btn-danger delete-item-btn" data-bs-toggle="modal"
                                     data-bs-target="#delete{{ $grade->id }}"
                                     data-grade="{{ $grade }}">{{ trans('Parent_trans.delete_Grade') }}</button> --}}


                             </td>

                         </tr>
                     @endforeach

                 </tbody>
             </table>
             <div class="noresult" style="display: none">
                 <div class="text-center">
                     <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                         colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                     </lord-icon>
                     <h5 class="mt-2">Sorry! No Result Found</h5>
                     <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                         orders for you search.</p>
                 </div>
             </div>
         </div>

         <div class="d-flex justify-content-end">
             <div class="pagination-wrap hstack gap-2">
                 <a class="page-item pagination-prev disabled" href="#">
                     {{ trans('pagination.previous') }}
                 </a>
                 <ul class="pagination listjs-pagination mb-0"></ul>
                 <a class="page-item pagination-next" href="#">
                     {{ trans('pagination.next') }}

                 </a>
             </div>
         </div>
     </div>
 </div><!-- end card -->
