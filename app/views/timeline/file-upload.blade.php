{{ Form::open(array('url'=>'submit-file-upld','files'=>true)) }}
  
{{ Form::label('file','Upload your File',array('id'=>'','class'=>'')) }}
{{ Form::file('file','',array('id'=>'','class'=>'')) }}
  <br/>
  <!-- submit buttons -->
{{ Form::submit('Save') }}
  
  <!-- reset buttons -->
{{ Form::reset('Reset') }}
  
{{ Form::close() }}