<form id="my-form" enctype="multipart/form-data" class="form-horizontal" action="{{route('admin-form-save')}}" method="post"">
				   {{ csrf_field() }}
				<input type="hidden" name="id" value=""/>  
				<input type="hidden" name="mode" value=""/>
                
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-hf-email">Commission</label>
                    <div class="col-md-6">
                        <input class="editable form-control" type="text" id="example-hf-email" name="commission"


                        value="<?php 

                       

                        ?>"
                        >
                    </div>
                </div>
                <div class="form-group col-md-6"></div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-hf-email">HST</label>
                    <div class="col-md-6">
                        <input class="editable form-control" type="text" id="example-hf-email" name="hst"


                        value="<?php 

                       

                        ?>"
                        >
                    </div>
                </div>
                <div class="form-group col-md-6"></div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-select">Status</label>
                    <div class="col-md-6">
                        <select class="form-control" name="example-select" size="1">
                            <option value="0" disabled>Please select</option>
                            @foreach(config('view.admin_status') as $m=>$n)

                            @if($m == $trans->status)
                            <option value="{{$m}}" selected>{{$n}}</option>
                            @else
                            <option value="{{$m}}">{{$n}}</option>
                            @endif

                            @endforeach
                          
                            
                        </select>
                    </div>
                </div>
             
                <div class="form-group col-md-6"></div>
                <div class="clearfix"></div>
               
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-hf-email">Close Date</label>
                    <div class="col-md-6">
                        <input class="editable form-control" type="text" id="example-hf-email" name="name" placeholder=""


                        value="<?php 

                       

                        ?>"
                        >
                    </div>
                </div>
                <div class="form-group col-md-6"></div>
                  <div class="clearfix"></div>
                  <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-hf-email">Reason</label>
                    <div class="col-md-6">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group col-md-6"></div>
                  <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <div class="col-md-4 col-md-offset-4">
                        <button class="btn btn-sm btn-primary" type="submit">Save</button>


                       
                        
                     
                    </div>
                </div>
                <div class="clearfix"></div>
            </form>	