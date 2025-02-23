<article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title">
					สายพันธุ์ทั้งหมด
					<a href="<?=base_url_admin().'category/'.$category->category_id.'/breed/add'?>" class="btn btn-primary btn-sm rounded-s"><i class="fa fa-plus"></i> เพิ่มสายพันธุ์ใหม่</a><!---->
                    <div class="action dropdown">
						<!--<button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
						<!--	คำสั่งจำนวนมาก-->
						<!--</button>-->
						<!--<div class="dropdown-menu" aria-labelledby="dropdownMenu1">-->
						<!--	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-close icon"></i>ลบทั้งหมดที่เลือก</a>-->
						<!--</div>-->
					</div>
				</h3>
                                    <p class="title-description"> <?=$category->category_name?> <a class="btn btn-secondary-outline" href="<?=base_url_admin().'project_type/'.$category->category_project_type_id?>"><i class="fa fa-chevron-left"></i> ชนิดทั้งหมด</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="items-search">
<!--                            <form class="form-inline">-->
<!--                                <div class="input-group"> <input type="text" class="form-control boxed rounded-s" placeholder="ค้นหาสายพันธุ์"> <span class="input-group-btn">-->
<!--					<button class="btn btn-secondary rounded-s" type="button">-->
<!--						<i class="fa fa-search"></i>-->
<!--					</button>-->
<!--				</span> </div>-->
<!--                            </form>-->
                        </div>
                    </div>
                    <div class="card items">
                        <ul class="item-list striped">
                            <li class="item item-list-header hidden-sm-down">
                                <div class="item-row">
                                    <div class="item-col fixed item-col-check"> <label class="item-check" id="select-all-items">
						<input type="checkbox" class="checkbox">
						<span></span>
					</label> </div>
                                    <div class="item-col item-col-header item-col-title">
                                        <div> <span>ชื่อสายพันธุ์</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-sales">
                                        <div> <span>จำนวนโปรเจ็ค</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-category">
                                        <div class="no-overflow"> <span>ประเภท</span> </div>
                                    </div>
                                    
                                    <div class="item-col item-col-header item-col-author">
                                        <div class="no-overflow"> <span>ชนิด</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-date">
                                        <div> <span>วันที่ลง</span> </div>
                                    </div>
                                    <div class="item-col item-col-header fixed item-col-actions-dropdown"> </div>
                                </div>
                            </li>
                            <?php foreach($breeds as $breed){?>
                            <?php $edit_url = base_url().'gnc_admin/category/'.$category->category_id.'/breed/'.$breed->breed_id ?>
                            <li class="item">
                                <div class="item-row">
                                    <div class="item-col fixed item-col-check">
                                            <label class="item-check" id="select-all-items">
							                <input type="checkbox" class="checkbox"><span></span></label> 
                                    </div>
                                    <div class="item-col fixed pull-left item-col-title">
                                        <div class="item-heading">ชื่อสายพันธุ์</div>
                                        <div>
                                            <a class="" href='<?=$edit_url?>'>
                                                <h4 class="item-title"><?=$breed->breed_name?></h4>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-sales">
                                        <div class="item-heading">จำนวนโปรเจ็ค</div>
                                        <div> <?=$breed->project_count?> รายการ </div>
                                    </div>
                                    <div class="item-col item-col-category no-overflow">
                                        <div class="item-heading">ประเภท</div>
                                        <div class="no-overflow"><a href="?page=allSpecies">ผัก</a></div>
                                    </div>
                                    <div class="item-col item-col-author">
                                        <div class="item-heading">ชนิด</div>
                                        <!--<div class="no-overflow">ผักบุ้ง </div>-->
                                        <div class="no-overflow"><?=$category->category_name?></div>
                                        
                                    </div>
                                    <div class="item-col item-col-date">
                                        <div class="item-heading">วันที่ลง</div>
                                        <div class="no-overflow"> 21 กันยายน 2559 10:45น. </div>
                                    </div>
                                    <div class="item-col fixed item-col-actions-dropdown">
                                        <div class="item-actions-dropdown">
                                            <a class="item-actions-toggle-btn"> <span class="inactive">
									<i class="fa fa-cog"></i>
								</span> <span class="active">
								<i class="fa fa-chevron-circle-right"></i>
								</span> </a>
                                            <div class="item-actions-block">
                                                <ul class="item-actions-list">
                                                    <?php if((int)$breed->project_count == 0){ ?>
                                                    <li>
                                                        <a class="remove" id="removeBreedBtn-<?=$breed->breed_id?>" href="#"> <i class="fa fa-trash-o "></i> </a>
                                                    </li>
                                                    <?php } ?>
                                                    <li>
                                                        <a class="edit" href="?page=editBreed"> <i class="fa fa-pencil"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <nav class="text-xs-right">
                        <ul class="pagination">
                            <!--<li class="page-item"> <a class="page-link" href="">
				ก่อนหน้า
			</a> </li>
                            <li class="page-item active"> <a class="page-link" href="">
				1
			</a> </li>
                            <li class="page-item"> <a class="page-link" href="">
				2
			</a> </li>
                            <li class="page-item"> <a class="page-link" href="">
				3
			</a> </li>
                            <li class="page-item"> <a class="page-link" href="">
				4
			</a> </li>
                            <li class="page-item"> <a class="page-link" href="">
				5
			</a> </li>
                            <li class="page-item"> <a class="page-link" href="">
				ถัดไป
			</a> </li>-->
                        </ul>
                    </nav>
                </article>

<script>
    
    $('[id^="removeBreedBtn-"]').click(function (){
        removeBreedId = getElementIdFromId($(this).prop('id'));
        param = {
            breed_id : removeBreedId,
        };
        
        $.ajax({
            type : 'post',
            url : webUrl + 'gnc_admin/breed/remove',
            data : param,
        }).done(function (data){
            if (data !== '1') {
                console.log(data);
                $('#cannotRemoveModal').modal('toggle');
                return;
            }
            
            location.reload();
        });
        
    });
    
</script>
