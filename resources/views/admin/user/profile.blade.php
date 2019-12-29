@extends('admin.master.app')

@section('bodyclass', 'user-profile-page')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Perfil del usuario</div>

                    <div class="card-body">
                        <form name="formProfile" method="POST" action="" aria-label="">
                            @csrf

                            <input type="hidden" name="id" value="{{ $item->id or '0' }}" />
                            <input type="hidden" name="_method" value="PATCH" />
                            
                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{ $item->email }}">
                                    <label for="email">E-Mail</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre.." value="{{ $item->name }}">
                                    <label for="name">Nombre</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-material">
                                    <div class="css-control css-control-info css-checkbox">
                                    <input class="css-control-input2 listfield" name="god" data-name="god" type="checkbox" value="1" {!! $item->god?'checked':''  !!}>
                                        <span class="css-control-indicator"></span> Dar al usuario permisos de Super Administrador<br><small>(Posee control total sobre todos los modulos y contenidos)</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-material">
                                    <label for="profiles">Perfiles</label>
                                    <input type="hidden" name="profiles" value="{{ $item->profiles->implode('id',',') }}">
                                    <ul id="available_profiles" class="profile-list connectedSortable">
                                        @foreach($item->profiles as $profile)
                                            <li data-id="{{$profile->id}}" class="ui-state-default">{{$profile->name}}</li>
                                        @endforeach
                                    </ul>
                                    <ul id="selected_profiles" class="profile-list connectedSortable">
                                        @foreach($availableProfiles as $profile)
                                            <li data-id="{{$profile->id}}" class="ui-state-default">{{$profile->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group text-md-right" style="clear:both">
                                <div class="form-material">
                                    <button id="btn-save" type="submit" class="btn btn-alt-primary action-button" on="rest"><i class="fa fa-spin fa-asterisk mr-5 on-working"></i><span class="on-rest">Guardar</span></button>
                                    <button id="btn-cancel" type="button" class="btn btn-alt-secondary">Cerrar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')

<script type="text/javascript">

    var formInit = function() {
        var form = $('form[name="formProfile"]');
        var submitButton = form.find('#btn-save');
        var cancelButton = form.find('#btn-cancel');
        var submitUrl = '{{ route('admin.user.patch',[ 'id' => $item->id] ) }}';

        // Validaciones del lado del cliente que dejo de lado (aunque funcionan bien), porque meto todas las validaciones en el controller, salvo forms que puedan ser pesados y quiera agarrarlos antes de que el usiuario se clave uploads
        // Forms Validation https://github.com/jzaefferer/jquery-validation
        // var formValidationInit = function(){
        //     form.validate({
        //         ignore: [],
        //         errorClass: 'invalid-feedback animated fadeInDown',
        //         errorElement: 'div',
        //         errorPlacement: function(error, e) {
        //             $(e).parents('.form-group').append(error);
        //         },
        //         highlight: function(e) {
        //             $(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
        //         },
        //         success: function(e) {
        //             $(e).closest('.form-group').removeClass('is-invalid');
        //             $(e).remove();
        //         },
        //         rules: {
        //             // 'name': {
        //             //     required: true,
        //             //     minlength: 3
        //             // },
        //             // 'slug': {
        //             //     required: true,
        //             //     pattern: /^[A-Za-z\d-.]+$/
        //             // },
        //             // 'layout': {
        //             //     required: true
        //             // }
        //         },
        //         messages: {
        //             // 'name': {
        //             //     required: 'Debe ingresar un nombre',
        //             //     minlength: 'El nombre debe tener al menos 3 caracteres'
        //             // },
        //             // 'slug': {
        //             //     required: 'Debe ingresar un slug',
        //             //     pattern: 'El slug contiene caracteres inválidos'
        //             // },
        //             // 'layout': 'Debe seleccionar una plantilla'
        //         }
        //     });
        // };


        var formSubmit = function(){

            if(submitButton.attr('on')=='working') return false;
            submitButton.attr('on','working');

            // corro las validaciones y si me da ok, es que podemos enviar el form
            if(form.valid()){

                var formdata = false;
                if (window.FormData){
                    formdata = new FormData(form[0]);
                }

                var data = formdata ? formdata : form.serialize();

                $.ajax({
                    url: submitUrl,
                    type: 'POST',
                    data: data,
                    cache       : false,
                    contentType : false,
                    processData : false,
                    dataType: 'JSON',
                    success: function (response) {
                        submitButton.attr('on','rest');

                        formSubmitedOk(response);

                    },
                    error: function (response) {
                        submitButton.attr('on','rest');
                        // console.log(response);

                        if(typeof response.status != 'undefined' && response.status == 403){ // VALIDACION

                            formHasValidations(response);

                        }
                        else{ // ERROR

                            formHasErrors(response);

                        }

                    }
                });

            }
            else{
                submitButton.attr('on','rest');
            }

        };

        // el formulario se envió y volvio OK
        var formSubmitedOk = function(response){

            setTimeout(function() {

                $.notify({
                    message: 'Todo perfecto!',
                },{
                    type: 'success',
                    placement: { from: 'top', align: 'center'}
                });

            }, 500);


        };

        // el formulario se enviópero surgieron validaciones del lado del controller
        var formHasValidations = function(response){

            if(typeof response.responseJSON.validations != 'undefined'){

                // el controller nos está informando validaciones del lado del server
                var validations = response.responseJSON.validations;
                Object.keys(validations).forEach(function(k){
                    // console.log(k + ' - ' + validations[k]);

                    var fieldGroup = form.find('*[name="'+k+'"]').closest('.form-group');
                        fieldGroup.addClass('is-invalid');
                        fieldGroup.append('<div id="slug-error" class="invalid-feedback animated fadeInDown">'+validations[k]+'</div>');

                });

            }

            $.notify({
                message: 'Mejor revisemos antes de enviar',
            },{
                type: 'danger',
                placement: { from: 'top', align: 'center'}
            });

        };

        // el formulario al enviarse devolvió algún error (controlado o no)
        var formHasErrors = function(response){

            // Veo si es un error de Laravel, devuelve un Json con la info de debug, caso contrario, asumo que es un texto que devuelvo desde el Controller
            var errorDescription = '';
            if(typeof response.responseJSON != 'undefined'){
                errorDescription = '<strong>Error:</strong> '  + response.responseJSON.message + '<br /><strong>Lugar:</strong> ' + response.responseJSON.file + '<br /><strong>Linea:</strong> ' + response.responseJSON.line;
            }
            else{
                errorDescription = response.responseText;
            }

            swal('Mmm.. tenemos un problema', errorDescription, 'error');

        };


        var initComponents = function(){

            // actualizar hidden con el valor destino de la lista combinada
            form.find(".profile-list").sortable({
                connectWith: ".connectedSortable",
                stop: function(event, ui) {
                    var ids = $.map(
                        $('#available_profiles').children('li'),
                        function(element) {
                            return $(element).attr('data-id')
                        })
                    .join(',');
                    $('input[name="profiles"]').val(ids);
                }
            }).disableSelection();


            // form.find('input[name="rank"]').next().raty({
            //     cancel: false,
            //     target: false,
            //     targetScore: false,
            //     precision: false,
            //     cancelOff: 'fa fa-fw fa-times-circle text-danger',
            //     cancelOn: 'fa fa-fw fa-times-circle',
            //     click: function(score, evt) {
            //         $(this).prev().val(score);
            //     }
            // });

        };


        return {
            init: function () {

                // formValidationInit();

                submitButton.on('click', function(e){
                    e.preventDefault();
                    formSubmit();
                })

                cancelButton.on('click', function(e){
                    e.preventDefault();

                    // document.location = '{{route('admin.user.list')}}';
                    window.history.back();
                    // closeModal();
                })

                initComponents();

            }
        };
    }();
    $(function(){
        formInit.init();
    });


</script>

@endsection
