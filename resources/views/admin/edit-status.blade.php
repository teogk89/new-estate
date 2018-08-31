<form id="my-form" enctype="multipart/form-data" class="form-horizontal" action="{{route('admin-transaction-save')}}" method="post"">
				   {{ csrf_field() }}
                 {{ csrf_field() }}   
				<input type="hidden" name="id" value="{{$trans->id}}"/>  
				<input type="hidden" name="mode" value=""/>
                
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-hf-email">Commission</label>
                    <div class="col-md-6">
                        <input class="editable form-control" type="text" id="example-hf-email" name="commission"


                        value="{{$trans->commission}}"
                        >
                    </div>
                </div>
                <div class="form-group col-md-6"></div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-hf-email">HST</label>
                    <div class="col-md-6">
                        <input class="editable form-control" type="text" id="example-hf-email" name="hst_number"


                        value="{{$trans->hst_number}}"
                        >
                    </div>
                </div>
                <div class="form-group col-md-6"></div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-select">Status</label>
                    <div class="col-md-6">
                        <select class="form-control" name="status" size="1">
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
                    <label class=" col-md-4 control-label" for="example-hf-email">Close Date</label>
                    <div class="col-md-6">
                        <input class="js-datetimepicker editable form-control" type="text" id="example-hf-email" name="close_date" placeholder=""


                        value="{{ $trans->dateOut('close_date')  }}"
                        >
                    </div>
                </div>
                <div class="form-group col-md-6"></div>
                  <div class="clearfix"></div>
                  <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-hf-email">Reason</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="reason_status">{{$trans->reason_status}}</textarea>
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