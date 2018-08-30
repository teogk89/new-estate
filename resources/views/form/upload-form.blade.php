
			<form id="my-form" enctype="multipart/form-data" class="form-horizontal" action="{{$action}}" method="post"">
				   {{ csrf_field() }}
                
                   
                <input type="hidden" name="user_id" value="{{ $user_id}}"/>   
				<input type="hidden" name="id" value="{{$form->id}}"/>  
				<input type="hidden" name="mode" value="{{$mode}}"/>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Name</label>
                    <div class="col-md-7">
                        <input class="form-control" type="text" id="example-hf-email" name="name" placeholder="Form name"


                        value="<?php 

                        if(old('name')){

                        	echo old('name');
                        }else{


                        	echo $form->name;
                        }

                        ?>"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-select">Category</label>
                    <div class="col-md-3">
                        <select class="form-control" name="example-select" size="1">
                            <option value="0" disabled>Please select</option>
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-password">File</label>
                    <div class="col-md-7">

                        @if($form->path == null)
                        <input type="file" name="file_path">
                        @else

                        <a target="_blank" href="/storage/{{$form->path}}"class="btn btn-sm btn-primary" type="button">View</a>

                        @endif
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Description</label>
                    <div class="col-md-7">
                        <textarea name="des" class="form-control"><?php 

                        if(old('des')){

                            echo old('des');
                        }else{


                            echo $form->des;
                        }

                        ?></textarea>     
                        
                      
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-password">Active</label>
                    <div class="col-md-7">
                         <input style="text-align: left" class="" type="checkbox" name="active" value="1" 
                         <?php

                         echo ($form->active == 1 ? "checked":"");

                         ?>
                         >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button class="btn btn-sm btn-primary" type="submit">Save</button>


                        @if($mode == 'edit')
                           <button class="btn btn-sm btn-danger" type="submit" name="submit" value="delete">Delete</button>
                        @endif
                     
                    </div>
                </div>
            </form>	

		