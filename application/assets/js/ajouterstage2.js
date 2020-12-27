var FormValidator = function () {
	"use strict";
	var validateCheckRadio = function (val) {
        $("input[type='radio'], input[type='checkbox']").on('ifChecked', function(event) {
			$(this).parent().closest(".has-error").removeClass("has-error").addClass("has-success").find(".help-block").hide().end().find('.symbol').addClass('ok');
		});
    }; 
    // function to initiate Validation Sample 1
    var runValidator2 = function () {
        var form2 = $('#form2');
        var errorHandler1 = $('.errorHandler', form2);
        var successHandler1 = $('.successHandler', form2);
        $.validator.addMethod("FullDate3", function () {
            //if all values are selected
            if ($("#dd3").val() != "" && $("#mm3").val() != "" && $("#yyyy3").val() != "") {
                return true;
            } else {
                return false;
            }
        }, 'Veuillez sélectionner un jour, un mois et une année');
        $.validator.addMethod("FullDate4", function () {
            //if all values are selected
            if ($("#dd4").val() != "" && $("#mm4").val() != "" && $("#yyyy4").val() != "") {
                return true;
            } else {
                return false;
            }
        }, 'Veuillez sélectionner un jour, un mois et une année ');
        $.validator.addMethod("inferieur", function () {
           
            if (($("#dd3").val() < $("#dd4").val()) && $("#mm3").val() == $("#mm4").val() &&  $("#yyyy3").val() == $("#yyyy4").val() ) {
             return true;
              }else if($("#mm3").val() < $("#mm4").val() &&  $("#yyyy3").val() == $("#yyyy4").val() ){
                return true;
              }else if($("#yyyy3").val() < $("#yyyy4").val()){
                return true;
              }else {return false }
        }, "Date doit etre postérieur à la date de debut de debut ");
        $('#form2').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd3" || element.attr("name") == "mm3" || element.attr("name") == "yyyy3") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else if (element.attr("name") == "dd4" || element.attr("name") == "mm4" || element.attr("name") == "yyyy4") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                stagiaire: {
                    required: true
                },
                Sujet: {
                    required: true
                },
                Tuteur: {
                    required: true
                },
                yyyy3: "FullDate3",
                yyyy4: {
                    FullDate4: true,
                    inferieur: true
                }
            },
            messages: {
                prenom: "Merci d'indiquer le prénom",
                nom: "Merci d'indiquer le nom de famille",
                email: {
                    required: "Nous avons besoin de l'adresse e-mail ",
                    email: "L'adresse e-mail doit être au format name@domain.com"
                },
                sexe: "S'il vous plaît vérifier un sexe!"
            },
            groups: {
                datenaiss: "dd3 mm3 yyyy3",
                datedepot: "dd4 mm4 yyyy4",
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
              //  successHandler1.hide();
                errorHandler1.show();
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
          
        });
    };

    return {
        //main function to initiate template pages
        init: function () {
        	validateCheckRadio();
            runValidator2();
        }
    };
}();