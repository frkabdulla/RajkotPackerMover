<div class="box-body">
  	<div class="row">
  		<div class="col-md-6">
  			<div class="form-group">
          <label>Name : <span class="text-danger">*</span></label>
              {!! Form::text('name', old('name'), array('placeholder' => 'Enter Name','class' => 'form-control')) !!}
              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
		    </div>		
  		</div>
  		<div class="col-md-6">
  			<div class="form-group">
          <label>Email : <span class="text-danger">*</span></label>
              {!! Form::text('email', old('email'), array('placeholder' => 'Enter Email','class' => 'form-control')) !!}
              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
		    </div>		
  		</div>
  	</div>
  	<div class="row">
  		<div class="col-md-6">
  			<div class="form-group">
          <label>Password : <span class="text-danger">*</span></label>
              {!! Form::password('password', array('placeholder' => 'Enter Password','class'=>'form-control','AutoComplete'=>'off')) !!}
              @error('password')
                <span class="text-danger">{{ $message }}</span>
              @enderror
		    </div>		
  		</div>
  		<div class="col-md-6">
  			<div class="form-group">
		      <label>Confirm Password :</label>
              {!! Form::password('password_confirmation', array('placeholder' => 'Enter Confirm Password','class'=>'form-control edit-password-c')) !!}
              @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
              @enderror
		    </div>		
  		</div>
  	</div>
<!--   	<div class="row">
  		<div class="col-md-6">
  			<div class="form-group">
          <label>Image : <span class="text-danger">*</span></label>
              {!! Form::file('profile', array('class' => 'form-control')) !!}
              @error('profile')
                <span class="text-danger">{{ $message }}</span>
              @enderror
		    </div>		
  		</div>
  		<div class="col-md-6">
  			<div class="form-group">
          <label>User Type <span class="text-danger">*</span></label>
          {!! Form::select('is_admin', [''=>'Select User Type','0'=>'User','1'=>'Admin'], null, array('class' => 'form-control')) !!}
          @error('is_admin')
                <span class="text-danger">{{ $message }}</span>
            @enderror
		    </div>		
  		</div>
  	</div> -->
</div>
<!-- /.box-body -->
<div class="box-footer text-center">
<a href="{{ route('users.index') }}" class="btn btn-danger btn-flat" style="width:77px;">Back</a>
<button type="submit" class="btn btn-success btn-flat">Submit</button>
</div>