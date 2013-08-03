$(document).ready(function () {
    $('#addMore').on('click', function () {
        var project_requirements = $('.project-requirements .requirements').length;
        project_requirements += 1;
        var requirements_html = '<div class="requirements">';
        requirements_html += '<span class="pull-left">';
        requirements_html += '<select name="data[ProjectTechnologies][' + project_requirements + '][technology_id]" id="ProjectTechnologies' + project_requirements + 'TechnologyId">';
        requirements_html += '<option value="">Select Technology</option>';
//        $.ajax({
//            method:'GET',
//            url:'/projects/getAllTechnologies',
//            success:function (response) {
//                console.log(response);
//            }
//        });
        requirements_html += '<option value="1">PHP</option>';
        requirements_html += '<option value="2">Ruby On Rails</option>';
        requirements_html += '<option value="3">Java</option>';
        requirements_html += '<option value="4">.Net</option>';
        requirements_html += '<option value="5">Iphone</option>';
        requirements_html += '<option value="6">Android</option>';
        requirements_html += '<option value="7">Frontend</option>';
        requirements_html += '<option value="8">UI/UX</option>';
        requirements_html += '<option value="9">Business Analyst</option>';
        requirements_html += '<option value="10">Quality Analyst</option>';
        requirements_html += '</select></span>';
        requirements_html += '<span class="pull-left">';

        requirements_html += '<select name="data[ProjectTechnologies][' + project_requirements + '][required_percentage]" id="ProjectTechnologies' + project_requirements + 'RequiredPercentage">';
        requirements_html += '<option value="">Allocation percentage</option>';
        for (var percentageCount = 5; percentageCount <= 100; percentageCount+5) {
            requirements_html += '<option value="' + percentageCount + '">' + percentageCount + '</option>';
        }
        requirements_html += '</select></span>';

        requirements_html += '<span class="pull-left">';

        requirements_html += '<select name="data[ProjectTechnologies][' + project_requirements + '][number_of_resources]" id="ProjectTechnologies' + project_requirements + 'NumberOfResources">';
        requirements_html += '<option value="">Number of resources</option>';
        for (var percentageAllocation = 1; percentageAllocation <= 10; percentageAllocation++) {
            requirements_html += '<option value="' + project_requirements + '">' + project_requirements + '</option>';
        }
        requirements_html += '</select></span>';

        requirements_html += '</div>';
        console.log(project_requirements);
    });
});