@extends('user.partials._app')
@section('body')

<div class="container">
       <div class="row">
         <div class="col-md-12 ">
          <h1>Contact Me</h1>
          <hr>
           <form>
             <div class="form-group">
               <label for="name">name</label>
               <input type="text" id="name" name="name" class="form-control">
             </div>
             <div class="form-group">
               <label for="email">Email</label>
               <input type="text" id="email" name="email" class="form-control">
             </div>
             <div class="form-group">
               <label for="message">Message</label>
               <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea> 
             </div>
             <input type="submit" class="btn btn-primary" value="Send Message">
           </form>
         </div>
       </div>
     </div>
@endsection