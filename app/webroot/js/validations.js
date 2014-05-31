/**
 * Created with JetBrains PhpStorm.
 * User: webonise
 * Date: 8/3/13
 * Time: 5:37 PM
 * To change this template use File | Settings | File Templates.
 */

jQuery(function () {

    $('#busy-indicator').hide();
    $('#unavailable').hide();
    $('#available').hide();

//    User form validations start
    jQuery("#UserUsername").validate({
        expression:"if (VAL) return true; else { $('#busy-indicator').hide(); $('#unavailable').hide(); $('#available').hide(); return false; }",
        message:"<div>Please enter the email id</div>"
    });
    jQuery("#UserUsername").validate({
        expression:"if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_-]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else { $('#busy-indicator').hide(); $('#unavailable').hide(); $('#available').hide(); return false; }",
        message:"<div>Please enter valid email id</div>"
    });
    jQuery("#UserUsername").validate({
        expression:"if (!check_user(VAL,1)) return true; else return false;",
        message:""
    });

    jQuery("#UserPassword").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please enter the password</div>"
    });
    jQuery("#UserPassword").validate({
        expression:"if (VAL.length < 8 || VAL.length > 15) return false; else return true;",
        message:"<div>Password must contain 8-15 characters</div>"
    });
    jQuery("#UserPassword").validate({
        expression:"if (!(/[a-z]/i.test(VAL)) || !(/[0-9]/.test(VAL))) return false; else return true;",
        message:"<div>Password must be alphanumeric</div>"
    });

    jQuery("#UserFirstName").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please enter the first name</div>"
    });
    jQuery("#UserFirstName").validate({
        expression:"if (VAL.match(/^[a-zA-Z ]+$/)) return true; else return false;",
        message:"<div>Please enter valid first name</div>"
    });

    jQuery("#UserLastName").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please enter the last name</div>"
    });
    jQuery("#UserLastName").validate({
        expression:"if (VAL.match(/^[a-zA-Z ]+$/)) return true; else return false;",
        message:"<div>Please enter valid first name</div>"
    });

    jQuery("#UserEmployeeId").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please enter the employee id</div>"
    });

    jQuery("#UserSalary").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please enter the annual salary</div>"
    });
    jQuery("#UserSalary").validate({
        expression:"if (VAL.match(/[1-9]/) && VAL > 0) return true; else return false;",
        message:"<div>Please enter valid annual salary</div>"
    });

    jQuery("#UserWorkExperience").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please enter the work experience</div>"
    });
    jQuery("#UserWorkExperience").validate({
        expression:"if (VAL.match(/[0-9]/)) return true; else return false;",
        message:"<div>Please enter valid work experience</div>"
    });

    jQuery("#UserTechnologyId").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please select technology</div>"
    });

    jQuery("#UserRoleId").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please select the role</div>"
    });
//    User form validations end


//    Project form validations start
    jQuery("#ProjectProjectName").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please enter the project name</div>"
    });
    jQuery("#ProjectAccountName").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please enter the account name</div>"
    });
    jQuery("#ProjectProjectType").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please enter the project type</div>"
    });
    jQuery("#ProjectDescription").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please enter the project description</div>"
    });
    jQuery("#start").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please enter the start date</div>"
    });
    jQuery("#end").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please enter the end date</div>"
    });
    jQuery("#ProjectTechnology1").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please select the technology</div>"
    });
    jQuery("#ProjectPercentage1").validate({
        expression:"if (VAL) return true; else return false;",
        message:"<div>Please select the percentages</div>"
    });
//    Project form validations end

    //for password change form
    jQuery("#UserChangePassword").validate({
        expression: "if (VAL) return true; else return false;",
        message: "<div>Please enter the password</div>"
    });
    jQuery("#UserChangePassword").validate({
        expression: "if (check_password(VAL)) return true; else return false;",
        message: "<div>Please enter valid old password</div>"
    });
    jQuery("#UserChangePassword").validate({
        expression: "if (VAL) return true; else return false;",
        message: "<div>Please enter new password</div>"
    });
    jQuery("#UserNewPassword").validate({
        expression: "if (!(/[a-z]/i.test(VAL)) || !(/[0-9]/.test(VAL))) return false; else return true;",
        message: "<div>Password must be alphanumeric</div>"
    });
    jQuery("#UserNewPassword").validate({
        expression: "if (VAL.length < 8 || VAL.length > 15) return false; else return true;",
        message: "<div>Password must contain 8-15 characters</div>"
    });
    jQuery("#UserConfirmPassword").validate({
        expression: "if (VAL) return true; else return false;",
        message: "<div>Please enter confirm password</div>"
    });
    jQuery("#UserConfirmPassword").validate({
        expression: "if ((VAL === jQuery('#UserNewPassword').val())) return true; else return false;",
        message: "<div>Passwords don't match</div>"
    });
});

function check_user(val,flag) {
    if (val != '' && val.match(/^[^\W][a-zA-Z0-9\_\-\.]+([a-zA-Z0-9\_\-\.]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/)) {
        $(this).ajaxStart(function () {
            $('#busy-indicator').show();
            $('#unavailable').hide();
            $('#available').hide();
        });

        $("#loading").ajaxStop(function () {
            $('#busy-indicator').hide();
        });

        return $.ajax({
            url:'/users/check_availability',
            type:'post',
            async:false,
            data:{data:{username:val}},
            success:function (response) {
                if (response != 1) {
                    $('#available').show();
                    $('#unavailable').hide();
                } else {
                    $('#available').hide();
                    $('#unavailable').show();
                }
                $('#busy-indicator').hide();
            }
        }).responseText;
    } else {
        $('#busy-indicator').hide();
        return false;
    }
}

function check_password(val) {
    return $.ajax({
        url:'/users/check_availability',
        type:'post',
        async:false,
        data:{data:{password:val}}
    }).responseText;
}