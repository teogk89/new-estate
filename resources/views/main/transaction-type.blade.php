
                            <!-- Simple Progress Wizard (.js-wizard-simple class is initialized in js/pages/base_forms_wizard.js) -->
                            <!-- For more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard -->
                            <div class="js-wizard-simple block">
                                <!-- Steps Progress -->
                                <div class="block-content block-content-mini block-content-full border-b">
                                    <div class="wizard-progress progress active remove-margin-b">
                                        <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                                <!-- END Steps Progress -->

                                <!-- Step Tabs -->
                                <ul class="nav nav-tabs nav-tabs-alt nav-justified">
                                    <li>
                                        <a href="#simple-progress-step1" data-toggle="tab" aria-expanded="false">1. Step 1</a>
                                    </li>
                                    <li class="">
                                        <a href="#simple-progress-step2" data-toggle="tab" aria-expanded="false">2. Step 2</a>
                                    </li>
                                    <li class="">
                                        <a href="#simple-progress-step3" data-toggle="tab" aria-expanded="true">3. Step 3</a>
                                    </li>
                                    <li>
                                        <a href="#simple-progress-step4" data-toggle="tab" aria-expanded="true">4. Step 4</a>
                                    </li>
                                </ul>
                                <!-- END Step Tabs -->

                                <!-- Form -->
                                <form data-step="{{{(isset($trans_type) ? $trans_type->current_step:'0') }}}" id="my-main-form" data-trans="{{{ $trans->id or '' }}}" data-mode="{{{(isset($trans_type) ? 'edit':'new') }}}" data-id="{{{ $trans_type->id or '' }}}" class="form-horizontal" action=""  enctype="multipart/form-data" method="post">
                                    <!-- Steps Content -->
                                    <div id="my-form" class="block-content tab-content">
                                        <!-- Step 1 -->
                                        <div class="tab-pane fade fade-right push-30-t push-50" id="simple-progress-step1">
                                        	
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <label for="validation-classic-skills"></label>
                                                    <select data-value="{{{ $trans_type->step1 or '' }}}" name="step1" data-pos="1" class="form-control step-box" id="step-one" name="validation-classic-skills" size="1">
                                                        <option value="Sale">Sale</option>
                                                        <option value="Lease">Lease</option>
                                               
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="Sale file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Agreement of purchase and sale </label>
                                                    @include('main.file-box',['name'=>'agreement-of-purchase-and-sale'])
                                            		
                                            	</div>

                                            </div>
                                            <div class="Lease file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Agreement to lease</label>
                                                    @include('main.file-box',['name'=>'agreement-to-lease'])
                                            		
                                            	</div>
                                            </div>
                                            <div class="Lease Sale file-field form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <label>Deposit receipt </label>
                                                    
                                                    @include('main.file-box',['name'=>'deposit-receipt'])
                                                </div>
                                            </div>
                                                

                                            <div class="Lease Sale file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Confirmation of cooperation and representation </label>
                                                    @include('main.file-box',['name'=>'confirmation-of-cooperation-and-representation'])
                                            		
                                            	</div>

                                            </div>
                                          
                                           
                                           	<div class="Lease file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Ontario residential tenancy agreement (standard form) </label>
                                                    @include('main.file-box',['name'=>'ontario-residential-tenancy-agreement'])
                                            	
                                            	</div>
                                            </div>
                                        </div>
                                        <!-- END Step 1 -->

                                        <!-- Step 2 -->
                                        <div class="tab-pane fade fade-right push-30-t push-50" id="simple-progress-step2">
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <label for="validation-classic-skills"></label>
                                                    <select data-value="{{{ $trans_type->step2 or '' }}}" data-pos="2" class="form-control step-box" id="step-two" name="step2" size="1">
                                                        <option class="Sale" value="Buyer">Buyer</option>
                                                        <option class="Sale" value="Seller">Seller</option>
                                               			<option class="Lease" value="Tenant">Tenant</option>
                                                        <option class="Lease" value="Landlord">Landlord</option>
                                                    </select>
                                                </div>
                                            </div>
                                            

                                           
                                            <div class="Tenant Buyer file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Buyer Representation Agreement </label>
                                                    @include('main.file-box',['name'=>'buyer-representation-agreement'])
                                            	
                                            	</div>

                                            </div>
                                            <div class="Buyer file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Working with a realtor (Buyer) </label>
                                                    @include('main.file-box',['name'=>'working-with-a-realtor-buyer'])
                                          
                                            	</div>
             
                                            </div>
                                            <div class="Tenant file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Working with a realtor (Tenant) </label>
                                                    @include('main.file-box',['name'=>'working-with-a-realtor-tenant'])
                                            	</div>
             
                                            </div>
                                            <div class="Buyer file-field form-group">
                                     
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Fintrac Receipt of funds record	 </label>
                                                    @include('main.file-box',['name'=>'fintrac-receipt-of-funds-record'])
                                            		
                                            	</div>
                                            	
                                            </div>
                                            <div class="Buyer file-field form-group">
                                     
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Fintrac Individual Identification information record</label>
                                                    @include('main.file-box',['name'=>'fintrac-individual-identification-information-record'])
                                            		
                                            	</div>
                                            	
                                            </div>
                                        </div>
                                        <!-- END Step 2 -->

                                        <!-- Step 3 -->
                                        <div class="tab-pane fade fade-right push-30-t push-50 active in" id="simple-progress-step3">
                                            
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <label for="validation-classic-skills"></label>
                                                    <select data-value="{{{ $trans_type->step3 or '' }}}" data-pos="3" class="form-control step-box" id="step-three" name="step3" size="1">

                                                        <option class="Buyer Tenant" value="MLS-Listing-or-Exclusive-Listing">MLS Listing or Exclusive Listing</option>
                                                        <option class="Buyer" value="Unpresented-seller">Unpresented seller</option>
                                                      
                                                        <option class="Landlord" value="MLS-Listing-landlord">MLS Listing</option>

                                                       	<option class="Landlord" value="Exclusive-landlord">Exclusive</option>

                                               			<option class="Tenant" value="Unpresented-landlord">Unpresented landlord</option>

                                                        <option class="Seller" value="Exclusive-seller">Exclusive</option>
                                                        <option class="Seller" value="MLS-Listing-seller">MLS Listing</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="MLS-Listing-seller MLS-Listing-landlord file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>MLS Listing agreement</label>
                                                    @include('main.file-box',['name'=>'mls-listing-agreement'])
                    
                                            	</div>
                                            </div>
                                             <div class="Exclusive-landlord Exclusive-seller file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Exclusive listing agreement</label>
                                                    @include('main.file-box',['name'=>'exclusive-listing-agreement'])
                                            	
                                            	</div>
                                            </div>
                                            
                                            <div class="Unpresented-landlord Unpresented-seller file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Seller customer service agreement</label>
                                                    @include('main.file-box',['name'=>'seller-customer-service-agreement'])
                                            		
                                            	</div>
                                            </div>
                                            <div class="Exclusive-landlord Exclusive-seller MLS-Listing-seller MLS-Listing-landlord Unpresented-seller file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Working with a realtor (seller)</label>
                                                    @include('main.file-box',['name'=>'working-with-a-realtor-seller'])
                                            	
                                            	</div>
                                            </div>
                                            <div class="Exclusive MLS-Listing Unpresented-landlord file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Working with a realtor (landlord)</label>
                                                    @include('main.file-box',['name'=>'working-with-a-realtor-landlor'])
                                            		
                                            	</div>
                                            </div>
                                            <div class="Exclusive-seller MLS-Listing-seller Unpresented-seller file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Fintrac individual identification information record </label>
                                            		
                                                    @include('main.file-box',['name'=>'fintrac-individual-identification-information-record'])
                                            	</div>
                                            </div>
                                            
                                           
                                           
                                        </div>
                                        <!-- END Step 3 -->
                                        <div class="tab-pane fade fade-right push-30-t push-50 active in" id="simple-progress-step4">
                                            
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <label for="validation-classic-skills"></label>
                                                    <select data-value="{{{ $trans_type->step4 or '' }}}" class="form-control step-box" id="step-four" name="step4" name="validation-classic-skills" size="1">
                                                        <option class="MLS-Listing-or-Exclusive-Listing" value="Mere-Posting">Mere Posting</option>
                                                      
                                                        <option class="MLS-Listing-or-Exclusive-Listing" value="Not-Mere-posting">Not Mere posting</option>
                                               			<option class="MLS-Listing-seller Exclusive" value="Buyer represented by a sales person">Buyer represented by a sales person</option>
                                               			<option class="MLS-Listing-seller Exclusive" value="Buyer-Unpresented">Buyer Unpresented</option>

                                               			<option class="MLS-Listing-landlord Exclusive-landlord" value="Tenant-represented-by-a-sales-person">Tenant represented by a sales person</option>
                                               			<option class="MLS-Listing-landlord Exclusive-landlord" value="Tenant-Unrepresented">Tenant Unrepresented</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="Mere-Posting file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Seller commision agreement with cooperating brokerage </label>
                                            		
                                                    @include('main.file-box',['name'=>'seller-commision-agreement-with-cooperating-brokerage'])
                                            	</div>
                                            </div>
                                            <div class="Tenant-Unrepresented Buyer-Unpresented file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Buyer customer service agreement  </label>
                                            		
                                                    @include('main.file-box',['name'=>'buyer-customer-service-agreement'])
                                            	</div>
                                            </div>
                                            <div class="Tenant-Unrepresented Buyer-Unpresented file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Working with a realtor (Tenant)</label>
                                            	
                                                    @include('main.file-box',['name'=>'working-with-a-realtor-tenant'])
                                            	</div>
                                            </div>
                                            <div class="Buyer-Unpresented file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Fintrac Individual identification information record</label>
                                            	
                                                    @include('main.file-box',['name'=>'fintrac-individual-identification-information-record'])
                                            	</div>
                                            </div>
                                            <div class="Buyer-Unpresented file-field form-group">
                                            	<div class="col-sm-8 col-sm-offset-2">
                                            		<label>Fintrac receipt of funds record</label>
                                            
                                                    @include('main.file-box',['name'=>'fintrac-receipt-of-funds-record'])
                                            	</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Steps Content -->

                                    <!-- Steps Navigation -->
                                    <div class="block-content block-content-mini block-content-full border-t">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <button class="wizard-prev btn btn-warning" type="button"><i class="fa fa-arrow-circle-o-left"></i> Previous</button>
                                            </div>
                                            <div class="col-xs-6 text-right">
                                            	<a class="btn btn-primary" data-toggle="modal" data-target="#modal-large" style="display: inline-block;"><i class="fa fa-save"></i> Over view</a>
                                                <button class="wizard-next btn btn-success disabled" type="button" style="display: none;">Next <i class="fa fa-arrow-circle-o-right"></i></button>

                                              
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Steps Navigation -->
                                </form>
                                <!-- END Form -->
                            </div>
                            <!-- END Simple Progress Wizard -->
                        