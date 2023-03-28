 @extends('dashboard.dashboardLayout')
 @section('title', 'Create User')

 @section('content')
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h4>Create User</h4>
                 </div>
                 <div class="card-body">
                     <form action="{{ route('users.store') }}" method="POST">
                         @csrf
                         <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" class="form-control" id="name" name="name"
                                 placeholder="Enter name" required>
                         </div>
                         <div class="form-group">
                             <label for="email">Email address</label>
                             <input type="email" class="form-control" id="email" name="email"
                                 placeholder="Enter email" required>
                         </div>
                         <div class="form-group">
                             <label for="password">Password</label>
                             <input type="password" class="form-control" id="password" name="password"
                                 placeholder="Enter password" required>
                         </div>
                         <div class="form-group">
                             <label for="usertype">Usertype</label>
                             <select class="form-control" id="usertype" name="usertype" required>
                                 <option value="">-- Select Usertype --</option>
                                 <option value="admin">Admin</option>
                                 <option value="user">User</option>
                             </select>
                         </div>
                         <button type="submit" class="btn btn-primary">Create</button>
                         <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 @endsection
