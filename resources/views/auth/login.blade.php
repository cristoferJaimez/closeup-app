

<div class=" vh-100  d-flex justify-content-center align-items-center ">
    <div class="col-md-8 col-sm-12 ">

            <p class="text-left">
               <img src="https://www.close-upinternational.com/img/logo.svg" width="60px" height="60px" alt="logo" class="p-1 border  rounded-circle" /> 
               <h2> Sign in</h2>
               
               <h6>Don't have an account? <a href="{{url('register')}}">Sign up</a></h6> 
            </p>
            <div class="card border border-light " >
                <div class="card-body">
                    
                    <form action="{{url('login')}}" method="POST">
                        <div class="form-group ">
                            <!--token-->
                            @csrf
                            <div class="mt-3">
                                <label class="form-label">Email address *</label>
                                <input type="email" class="form-control" required autofocus
                                    value="{{ old('email') }}" name="email" placeholder="Email..." />
                            
                            <div class="form-text text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                            </div>
                            <div class="mt-3">
                                <label class="form-label">Password * </label>
                                <input type="password" class="form-control" required name="password"
                                    placeholder="Password..." />
                           
                            <div class="form-text text-danger"> @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                            </div>
                            <div class="mt-3">
                                <label>
                                    <input type="checkbox" name="remember" />
                                    <p class="card-link " style="display: inline">Remember me?</p>
                                </label>
                            </div>
                            <br>

                            <div class="d-grid gap-1">
                                <button class="btn mt-2  btn-primary" type="submit">Sign In</button>
                              </div>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

