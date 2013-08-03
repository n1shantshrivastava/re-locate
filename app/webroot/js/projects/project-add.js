$(document).ready(function () {
    $('#addMore').on('click', function () {
        var project_requirements = $('.project-requirements .requirements').length;
        var technologies;
        project_requirements = parseInt(project_requirements) + 1;
        var requirements_html = '<div class="requirements clearfix">';
        requirements_html += '<span class="pull-left">';
        requirements_html += '<select name="data[ProjectResourceRequirements][' + project_requirements + '][technology_id]" id="ProjectResourceRequirements' + project_requirements + 'TechnologyId">';
        requirements_html += '<option value="">Select Technology</option>';

        $.ajax({
            method:'GET',
            async:false,
            url:'/projects/getAllTechnologies',
            success:function (response) {
                technologies = response;
            }
        });
        var technologiesArray = jQuery.parseJSON(technologies);
        for (var key in technologiesArray) {
            requirements_html += '<option value="' + key + '">' + technologiesArray[key] + '</option>';
        }
        requirements_html += '</select></span>';
        requirements_html += '<span class="pull-left">';

        requirements_html += '<select name="data[ProjectResourceRequirements][' + project_requirements + '][required_percentage]" id="ProjectResourceRequirements' + project_requirements + 'RequiredPercentage">';
        requirements_html += '<option value="">Allocation percentage</option>';
        for (var percentageCount = 5; percentageCount <= 100; percentageCount = percentageCount + 5) {
            requirements_html += '<option value="' + percentageCount + '">' + percentageCount + '</option>';
        }
        requirements_html += '</select></span>';

        requirements_html += '<span class="pull-left">';

        requirements_html += '<select name="data[ProjectResourceRequirements][' + project_requirements + '][no_of_resources]" id="ProjectResourceRequirements' + project_requirements + 'NoOfResources">';
        requirements_html += '<option value="">Number of resources</option>';
        for (var percentageAllocation = 1; percentageAllocation <= 10; percentageAllocation++) {
            requirements_html += '<option value="' + percentageAllocation + '">' + percentageAllocation + '</option>';
        }
        requirements_html += '</select></span>';

        requirements_html += '</div>';

//        console.log('write on variable done');
        $('#project-requirements').append(requirements_html);
    });
});