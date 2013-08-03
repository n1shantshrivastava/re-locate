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
        expression:"if (VAL) return true; else return false;",
        message:"Please enter the email id"
    });
    jQuery("#UserUsername").validate({
        expression:"if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_-]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
        message:"Please enter valid email id"
    });
    jQuery("#UserUsername").validate({
        expression:"if (!check_user(VAL,1)) return true; else return false;",
        message:""
    });

    jQuery("#UserPassword").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please enter the password"
    });
    jQuery("#UserPassword").validate({
        expression:"if (VAL.length < 8 || VAL.length > 15) return false; else return true;",
        message:"Password must contain 8-15 characters"
    });
    jQuery("#UserPassword").validate({
        expression:"if (!(/[a-z]/i.test(VAL)) || !(/[0-9]/.test(VAL))) return false; else return true;",
        message:"Password must be alphanumeric"
    });

    jQuery("#UserFirstName").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please enter the first name"
    });
    jQuery("#UserFirstName").validate({
        expression:"if (VAL.match(/^[a-zA-Z ]+$/)) return true; else return false;",
        message:"Please enter valid first name"
    });

    jQuery("#UserLastName").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please enter the last name"
    });
    jQuery("#UserLastName").validate({
        expression:"if (VAL.match(/^[a-zA-Z ]+$/)) return true; else return false;",
        message:"Please enter valid first name"
    });

    jQuery("#UserEmployeeId").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please enter the employee id"
    });

    jQuery("#UserSalary").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please enter the annual salary"
    });
    jQuery("#UserSalary").validate({
        expression:"if (VAL.match(/[1-9]/) && VAL > 0) return true; else return false;",
        message:"Please enter valid annual salary"
    });

    jQuery("#UserWorkExperience").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please enter the work experience"
    });
    jQuery("#UserWorkExperience").validate({
        expression:"if (VAL.match(/[0-9]/)) return true; else return false;",
        message:"Please enter valid work experience"
    });

    jQuery("#UserTechnologyId").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please select technology"
    });

    jQuery("#UserRoleId").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please select the role"
    });
//    User form validations end


//    Project form validations start
    jQuery("#ProjectProjectName").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please enter the project name"
    });
    jQuery("#ProjectAccountName").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please enter the account name"
    });
    jQuery("#ProjectProjectType").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please enter the project type"
    });
    jQuery("#ProjectDescription").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please enter the project description"
    });
    jQuery("#start").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please enter the start date"
    });
    jQuery("#end").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please enter the end date"
    });
    jQuery("#ProjectTechnology1").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please select the technology"
    });
    jQuery("#ProjectPercentage1").validate({
        expression:"if (VAL) return true; else return false;",
        message:"Please select the percentages"
    });
//    Project form validations end

    //for password change form
    jQuery("#UserChangePassword").validate({
        expression: "if (VAL) return true; else return false;",
        message: "Please enter the password"
    });
    jQuery("#UserChangePassword").validate({
        expression: "if (check_password(VAL)) return true; else return false;",
        message: "Please enter valid old password"
    });
    jQuery("#UserChangePassword").validate({
        expression: "if (VAL) return true; else return false;",
        message: "Please enter new password"
    });
    jQuery("#UserNewPassword").validate({
        expression: "if (!(/[a-z]/i.test(VAL)) || !(/[0-9]/.test(VAL))) return false; else return true;",
        message: "Password must be alphanumeric"
    });
    jQuery("#UserNewPassword").validate({
        expression: "if (VAL.length < 8 || VAL.length > 15) return false; else return true;",
        message: "Password must contain 8-15 characters"
    });
    jQuery("#UserConfirmPassword").validate({
        expression: "if (VAL) return true; else return false;",
        message: "Please enter confirm password"
    });
    jQuery("#UserConfirmPassword").validate({
        expression: "if ((VAL === jQuery('#UserNewPassword').val())) return true; else return false;",
        message: "Passwords don't match"
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