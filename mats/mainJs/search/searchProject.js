$(document).ready(function() {
    var searchKeyword = $('#searchKeyword');
    var searchBtn = $('#searchBtn');
    var selectSortProjectBy = $('#selectSortProjectBy');
    var searchProjects = $('#searchProjects');
    
    var page = $('#page');
    var projectPageList = $('#projectPageList');
    var limit = 16;
    
    // Init
    setSearchProjects();
    
    // Set callbacks
    selectSortProjectBy.change(setSearchProjects);
    
    function setSearchProjects() {
        
        keyword = searchKeyword.val();
        offset = (limit * parseInt(page.val())) - limit;
        orderType = selectSortProjectBy.val();
        
        param = {
            'keyword' : keyword,
            'limit' : limit,
            'offset' : offset,
            'order_type' : orderType,
        };
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'search/search_projects_ajax',
            data : param
        }).done(function (data){
            
            jsonData = JSON.parse(data);
            projectArray = jsonData.result;
            projectCount = jsonData.count;
            
            // Reset list
            searchProjects.empty();
            projectPageList.empty();
            
            // Set project list
            projectArray.forEach(function (project, index){
                projectUrl = webUrl + 'project/' + project.project_id;
                
                if (project.breed_name) {
                    categoryText = project.category_name + ' - ' + project.breed_name;
                }else{
                    categoryText = project.category_name;
                }
                
                content = '<div class="col-md-3 col-sm-6">' + 
                        '<div class="easy-block-v2">' +
                            '<img style="height: 170px;" alt="" src="' + webUrl + project.project_cover_image_path + '">' + 
                            '<h3>' + project.project_name + '</h3>' + 
                            '<ul class="list-unstyled">' + 
                                '<li><span class="color-green">ประเภท:</span>' + projectTypeThaiDict[project.project_type_name] +  ' / ' + categoryText + '</li>' + 
                                '<li><span class="color-green">ราคา:</span>' + project.project_ppu + '  บาท/' + project.unit_name + '</li>' + 
                                '<li><span class="color-green">ฟาร์ม:</span> ' + project.farm_name + '</li>' + 
                                '<li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> ' + project.farm_district + ', ' + project.farm_province + '</li>' + 
                            '</ul>' + 
                            '<a class="btn-u btn-u-sm" href="' + projectUrl +'">ดูโปรเจ็คนี้</a>' +
                            ' <label class="checkbox-inline compareCheck"><input type="checkbox" id="inlineCheckbox1" value="option1" class="compair"> เปรียบเทียบ</label>' + 
                        '</div>' + 
                    '</div>';
                    
                searchProjects.append(content);
            });
            
            
            // Set pagination
            if (projectCount < limit) {
            
            }else{
                if (projectCount % limit === 0) {
                    pageAmount = (projectCount / limit);
                }else{
                    pageAmount = (projectCount / limit) + 1;
                }
                
                for(i=1;i<=pageAmount;i++){
                    classActive = '';
                    if (parseInt(page.val()) === i) {
                        classActive = 'active';
                    }
                    projectPageList.append('<li class="' + classActive + '"><a class="pageBtn" href="#">' + i + '</a></li>');
                }
                var pageBtn = $('.pageBtn');
                
                $('#projectPageList li').on('click', function (e){
                    e.preventDefault();
                    newPage = parseInt($(this).text());
                    page.val(newPage);
                    setSearchProjects();
                });
            }
        });
        
    }
    
});