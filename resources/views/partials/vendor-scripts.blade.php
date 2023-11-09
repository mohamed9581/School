<!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/repeaterRow.js') }}"></script>
<!-- invoicelist init js -->
<script src="{{ URL::asset('assets/js/pages/invoiceslist.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins.js') }}"></script>
<!-- Modern colorpicker bundle -->
<script src="{{ URL::asset('assets/libs/@simonwep/pickr/pickr.min.js') }}"></script>

<!-- init js -->
<script src="{{ URL::asset('assets/js/pages/form-pickers.init.js') }}"></script>

<script type="text/javascript">
    // :::::::::::::::cette ligne pour obtenir l'url du site::::::::::::::
    var SITEURL = '{{ URL::to('') }}';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {

        $('select[name="grade_id"]').on('change', function() {
            var grade_id = $(this).val();
            console.log(grade_id);
            //pour recuperer la langue active
            var langueActive = $('html').attr('lang');
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + grade_id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="classe_id"]').empty();

                        if (langueActive == 'ar') {
                            $('select[name="classe_id"]').append(
                                '<option selected disabled>--اختر الفصل--</option>');
                        } else {

                            $('select[name="classe_id"]').append(
                                '<option selected disabled>--Choisir la classe--</option>'
                            );
                        }
                        $.each(data, function(key, value) {
                            if (langueActive == 'ar') {
                                $('select[name="classe_id"]').append(
                                    '<option value="' +
                                    value.id + '">' +
                                    value.nomClasse.ar + '</option>');
                            } else {
                                $('select[name="classe_id"]').append(
                                    '<option value="' +
                                    value.id + '">' +
                                    value.nomClasse.en + '</option>');
                            }
                        });

                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });

        $('select[name="classe_id"]').on('change', function() {
            var classe_id = $(this).val();
            console.log(classe_id);
            //pour recuperer la langue active
            var langueActive = $('html').attr('lang');
            if (classe_id) {
                $.ajax({
                    url: "{{ URL::to('sections') }}/" + classe_id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="section_id"]').empty();

                        if (langueActive == 'ar') {
                            $('select[name="section_id"]').append(
                                '<option selected disabled>--اختر القسم--</option>');
                        } else {

                            $('select[name="section_id"]').append(
                                '<option selected disabled>--Choisir section--</option>'
                            );
                        }
                        $.each(data, function(key, value) {
                            if (langueActive == 'ar') {
                                $('select[name="section_id"]').append(
                                    '<option value="' +
                                    value.id + '">' +
                                    value.nomSection.ar + '</option>');
                            } else {
                                $('select[name="section_id"]').append(
                                    '<option value="' +
                                    value.id + '">' +
                                    value.nomSection.en + '</option>');
                            }
                        });


                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });

        $('select[name="to_grade_id"]').on('change', function() {
            var grade_id = $(this).val();
            console.log(grade_id);
            //pour recuperer la langue active
            var langueActive = $('html').attr('lang');
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + grade_id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="to_classe_id"]').empty();

                        if (langueActive == 'ar') {
                            $('select[name="to_classe_id"]').append(
                                '<option selected disabled>--اختر الفصل--</option>');
                        } else {

                            $('select[name="to_classe_id"]').append(
                                '<option selected disabled>--Choisir la classe--</option>'
                            );
                        }
                        $.each(data, function(key, value) {
                            if (langueActive == 'ar') {
                                $('select[name="to_classe_id"]').append(
                                    '<option value="' +
                                    value.id + '">' +
                                    value.nomClasse.ar + '</option>');
                            } else {
                                $('select[name="to_classe_id"]').append(
                                    '<option value="' +
                                    value.id + '">' +
                                    value.nomClasse.en + '</option>');
                            }
                        });

                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });

        $('select[name="to_classe_id"]').on('change', function() {
            var classe_id = $(this).val();
            console.log(classe_id);
            //pour recuperer la langue active
            var langueActive = $('html').attr('lang');
            if (classe_id) {
                $.ajax({
                    url: "{{ URL::to('sections') }}/" + classe_id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="to_section_id"]').empty();

                        $.each(data, function(key, value) {
                            if (langueActive == 'ar') {
                                $('select[name="to_section_id"]').append(
                                    '<option value="' +
                                    value.id + '">' +
                                    value.nomSection.ar + '</option>');
                            } else {
                                $('select[name="to_section_id"]').append(
                                    '<option value="' +
                                    value.id + '">' +
                                    value.nomSection.en + '</option>');
                            }
                        });

                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });

        $('select[name="section_id"]').on('change', function() {
            var section_id = $(this).val();
            console.log(section_id);
            //pour recuperer la langue active
            var langueActive = $('html').attr('lang');
            if (section_id) {
                $.ajax({
                    url: "{{ URL::to('TeacherSections') }}/" + section_id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="teacher_id"]').empty();

                        if (langueActive == 'ar') {
                            $('select[name="teacher_id"]').append(
                                '<option selected disabled>--اختر المدرس--</option>');
                        } else {

                            $('select[name="teacher_id"]').append(
                                '<option selected disabled>--Choisir professeur--</option>'
                            );
                        }
                        $.each(data, function(key, value) {
                            if (langueActive == 'ar') {
                                $('select[name="teacher_id"]').append(
                                    '<option value="' +
                                    value.id + '">' +
                                    value.name.ar + '</option>');
                            } else {
                                $('select[name="teacher_id"]').append(
                                    '<option value="' +
                                    value.id + '">' +
                                    value.name.en + '</option>');
                            }
                        });

                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });

        $(document).on('change', '.fee-select', function() {
            var selectedFee = $(this).val();
            console.log(selectedFee);
            var amountSelect = $(this).closest('tr').find('.amount-select');
            updateAmountOptions(selectedFee, amountSelect);
        });


        function updateAmountOptions(selectedFee, amountSelect) {
            var langueActive = $('html').attr('lang');
            $.ajax({
                url: "{{ URL::to('fees') }}/" + selectedFee,
                type: "post",
                dataType: "json",
                success: function(data) {
                    amountSelect.empty();

                    $.each(data, function(key, value) {

                        $(amountSelect).append(
                            '<option value="' +
                            value.amount + '">' +
                            value.amount + '</option>');
                    });
                }
            });

        }

        $(document).on('change', '.fee-select-update', function() {
            var selectedFee = $(this).val();
            console.log(selectedFee);
            var amountSelect = $(this).closest('tr').find('.amount-select-update');
            updateAmountInput(selectedFee, amountSelect);
        });


        function updateAmountInput(selectedFee, amountSelect) {

            $.ajax({
                url: "{{ URL::to('fees') }}/" + selectedFee,
                type: "post",
                dataType: "json",
                success: function(data) {
                    amountSelect.val();

                    $.each(data, function(key, value) {
                        $(amountSelect).val(value.amount);
                    });
                }
            });
        }


        $('select[name="grades_id"]').on('change', function() {
            var grade_id = $(this).val();
            console.log(grade_id);
            //pour recuperer la langue active
            var langueActive = $('html').attr('lang');
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('teacher/classes') }}/" + grade_id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="classes_id"]').empty();

                        if (langueActive == 'ar') {
                            $('select[name="classes_id"]').append(
                                '<option selected disabled>--اختر الفصل--</option>');
                        } else {

                            $('select[name="classes_id"]').append(
                                '<option selected disabled>--Choisir la classe--</option>'
                            );
                        }
                        $.each(data, function(key, value) {
                            if (langueActive == 'ar') {
                                $('select[name="classes_id"]').append(
                                    '<option value="' +
                                    value.id + '">' +
                                    value.nomClasse.ar + '</option>');
                            } else {
                                $('select[name="classes_id"]').append(
                                    '<option value="' +
                                    value.id + '">' +
                                    value.nomClasse.en + '</option>');
                            }
                        });

                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });

        $('select[name="classes_id"]').on('change', function() {
            var classe_id = $(this).val();
            console.log(classe_id);
            //pour recuperer la langue active
            var langueActive = $('html').attr('lang');
            if (classe_id) {
                $.ajax({
                    url: "{{ URL::to('teacher/sections') }}/" + classe_id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="sections_id"]').empty();

                        if (langueActive == 'ar') {
                            $('select[name="sections_id"]').append(
                                '<option selected disabled>--اختر القسم--</option>');
                        } else {

                            $('select[name="sections_id"]').append(
                                '<option selected disabled>--Choisir section--</option>'
                            );
                        }
                        $.each(data, function(key, value) {
                            if (langueActive == 'ar') {
                                $('select[name="sections_id"]').append(
                                    '<option value="' +
                                    value.id + '">' +
                                    value.nomSection.ar + '</option>');
                            } else {
                                $('select[name="sections_id"]').append(
                                    '<option value="' +
                                    value.id + '">' +
                                    value.nomSection.en + '</option>');
                            }
                        });


                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });


    });
</script>
