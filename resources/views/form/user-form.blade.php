
			<form id="my-form" enctype="multipart/form-data" class="form-horizontal" action="{{$action}}"method="post">
				 {{ csrf_field() }}

                <input type="hidden" name="mode" value="{{$mode}}"/>
                <input type="hidden" name="id" value="{{$user->id}}"/> 
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-hf-email">Fist name</label>
                    <div class="col-md-6">
                        <input class="form-control" name="Fname" placeholder="" value="{{$user->Fname}}"type="text">
                    </div>
                </div>
                <div class="form-group col-md-6">
                	<label class="col-md-4 control-label" for="example-hf-email">Reco Registration number</label>
                    <div class="col-md-6">
                        <input class="form-control" name="reco_number" placeholder="" value="{{$user->reco_number}}" type="text">
                    </div>

                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-hf-email">Last name</label>
                    <div class="col-md-6">
                        <input class="form-control" name="Lname" placeholder="" value="{{$user->Lname}}"type="text">
                    </div>
                </div>
             
                <div class="form-group col-md-6">
                 	<label class="col-md-4 control-label" for="example-hf-email">Treb number</label>
                    <div class="col-md-6">
                        <input class="form-control" name="treb" placeholder="" value="{{$user->treb}}"type="text">
                    </div>

                </div>
                <div class="clearfix"></div>
               
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-hf-email">Email</label>
                    <div class="col-md-6">
                        <input class="form-control" id="example-hf-email" name="email" placeholder="" value="{{$user->email}}" type="text">
                    </div>
                </div>
                <div class="form-group col-md-6">
                	<label class="col-md-4 control-label" for="example-hf-email">HST number</label>
                    <div class="col-md-6">
                        <input class="form-control" name="hst_number" placeholder="" value="{{ $user->hst_number }}" type="text">
                    </div>

                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-hf-email"> Change Password</label>
                    <div class="col-md-6">

                        @if($mode == "edit")
                            <input class="form-control password" id="example-hf-email" name="password" placeholder="leave blank if not change" value="" type="password">
                        @else
                            <input class="form-control password" id="example-hf-email" name="password" placeholder="" value="" type="password">
                        @endif
                        
                    </div>
                </div>
                <div class="form-group col-md-6"></div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-hf-email"> Confirm Password</label>
                    <div class="col-md-6">
                        @if($mode == "edit")
                            <input class="form-control password" id="example-hf-email" name="confirm" placeholder="leave blank if not change" value=""  type="password">
                        @else
                            <input class="form-control password" id="example-hf-email" name="confirm" placeholder="" value=""  type="password">
                        @endif
                        
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
		