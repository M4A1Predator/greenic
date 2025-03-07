var projectTypeId = $('#projectTypeId');
var categories = $('#categories');

var lastProjects = $('#lastProjects');
var popProjects = $('#popProjects');

var showMoreCategoryBtn= $('#showMoreCategoryBtn');

setCategories();
setLastProjects();
setPopProjects();

function setCategories(){
    
    borderColorClass = 'btn-u';
    if (projectTypeId.val() == '1') {
        borderColorClass = 'btn-u';
    }else if (projectTypeId.val() == '2') {
        borderColorClass = 'btn-orange';
    }else if (projectTypeId.val() == '3') {
        borderColorClass = 'btn-brown';
    }
    
    limit = 8;
    
    param = {
        'project_type_id' : projectTypeId.val(),
        'limit' : limit,
    };
    
    $.ajax({
        type : 'GET',
        //url : webUrl + 'get_categories_ajax',
        url : webUrl + 'category/get_categories_ajax',
        data : param
    }).success(function (data){
        
        jsonData = JSON.parse(data);
        
        // Get data
        categoryArray = jsonData.result;
        categoryCount = parseInt(jsonData.count);
        
        categoryArray.forEach(function (category){
            
            categoryUrl = webUrl + 'category/' + $('#projectTypeName').val() + '/' + category.category_id;
            nameText = category.category_name + ' (' + category.project_count + ')';
            
            content = '<div class="col-sm-6 col-md-3">' + 
                '<a href="' + categoryUrl  + '"  class="btn-u btn-brd  btn-u-lg subCate ' + borderColorClass + '"> ' + nameText + ' </a>' + 
            '</div>';
            
            categories.append(content);
            
        });
        
        // Set up show more button
        if (categoryCount < limit) {
            showMoreCategoryBtn.hide();
        }else{
            
        }
        
    });
}

function setLastProjects() {
    
    param = 'limit=' + 8;
    param += '&project_type_id=' + projectTypeId.val();
    
    $.ajax({
        type : 'GET',
        url : webUrl  + 'category/get_last_projects_ajax',
        data : param
    }).success(function (data){
        jsonData = JSON.parse(data);
        
        //lastProjects.append('<div class="row">');
        jsonData.forEach(function (project, index){

            if (project.breed_name) {
                categoryText = project.category_name + ' - ' + project.breed_name;
            }else{
                categoryText = project.category_name;
            }
            
            projectUrl = webUrl + 'project/' + project.project_id;
            
            if (!project.project_cover_image_path) {
                project.project_cover_image_path = 'mats/assets/img/main/img9.jpg';
            }
            
            content = '<div class="col-md-3 col-sm-6">' + 
					'<div class="easy-block-v2">' + 
                        //'<a href="singleProduct.php" class="linkFull"></a>' + 
						'<div class="easy-bg-v2 rgba-default">มาใหม่</div>' +
						'<img style="height: 170px;" alt="" src="' + webUrl + project.project_cover_image_path + '">' + 
						'<h3>' + project.project_name + '</h3>' + 
						'<ul class="list-unstyled">' + 
							'<li><span class="color-green">ประเภท:</span>' + projectTypeThaiDict[project.project_type_name] +  ' / ' + categoryText + '</li>' + 
							'<li><span class="color-green">ราคา:</span>' + project.project_ppu + '  บาท/' + project.unit_name + '</li>' + 
                            '<li><span class="color-green">ฟาร์ม:</span> ' + project.farm_name + '</li>' + 
							'<li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> ' + project.farm_district + ', ' + project.farm_province + '</li>' + 
						'</ul>' + 
						'<a class="btn-u btn-u-sm" href="' + projectUrl +'">ดูโปรเจ็คนี้</a>' +
					'</div>' + 
				'</div>';
                
            //if (index % 4 === 1) {
            //    lastProjects.append('<div class="row">');
            //}
            
            lastProjects.append(content);
            
        });
        //lastProjects.append('</div>');
    });
}

function setPopProjects() {
    
    param = 'limit=' + 8;
    param += '&project_type_id=' + projectTypeId.val();
    
    $.ajax({
        type : 'GET',
        url : webUrl  + 'category/get_popular_projects_ajax',
        data : param
    }).success(function (data){
        jsonData = JSON.parse(data);
        
        //lastProjects.append('<div class="row">');
        jsonData.forEach(function (project, index){

            if (project.breed_name) {
                categoryText = project.category_name + ' - ' + project.breed_name;
            }else{
                categoryText = project.category_name;
            }
            
            projectUrl = webUrl + 'project/' + project.project_id;
            
            if (!project.project_cover_image_path) {
                project.project_cover_image_path = 'mats/assets/img/main/img9.jpg';
                //project.project_cover_image_path = projectDefaultImagePath;
            }
            
            content = '<div class="col-md-3 col-sm-6">' + 
					'<div class="easy-block-v2">' + 
                        //'<a href="singleProduct.php" class="linkFull"></a>' + 
						'<div class="easy-bg-v2 rgba-red">ยอดนิยม</div>' +
						'<img style="height: 170px;" alt="" src="' + webUrl + project.project_cover_image_path + '">' + 
						'<h3>' + project.project_name + '</h3>' + 
						'<ul class="list-unstyled">' + 
							'<li><span class="color-green">ประเภท:</span>' + projectTypeThaiDict[project.project_type_name] +  ' / ' + categoryText + '</li>' + 
							'<li><span class="color-green">ราคา:</span>' + project.project_ppu + '  บาท/' + project.unit_name + '</li>' + 
                            '<li><span class="color-green">ฟาร์ม:</span> ' + project.farm_name + '</li>' + 
							'<li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> ' + project.farm_district + ', ' + project.farm_province + '</li>' + 
						'</ul>' + 
						'<a class="btn-u btn-u-sm" href="' + projectUrl +'">ดูโปรเจ็คนี้</a>' +
					'</div>' + 
				'</div>';
                
            //if (index % 4 === 1) {
            //    lastProjects.append('<div class="row">');
            //}
            
            popProjects.append(content);
            
        });
        //lastProjects.append('</div>');
    });
}