<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}
                </a>
            </div>
        </div>
        @endif
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>GAMES</span> <i
                        class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('addGame')}}">Add Games</a></li>
                    <li><a href="{{route('gameslist')}}">Games List</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Player</span> <i
                        class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                    <li><a href="{{route('addPlayer')}}">Add Player</a></li>
                    <li><a href="{{route('playerslist')}}">Players List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Tournaments</span> <i
                        class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                    <li><a href="{{route('addTournament')}}">Add Tournament</a></li>
                    <li><a href="{{route('Tournamentslist')}}">Tournaments List</a></li>
                    <li><a href="{{route('Matcheslist')}}">Matches List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class='fa fa-users'></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                    <li><a href="{{route('addUser')}}">Add user</a></li>
                    <li><a href="{{route('listUsers')}}">Users List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class='fa fa-users'></i> <span>Matches</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                    <li><a href="{{route('addMatch')}}">Add Match</a></li>
                    <li><a href="{{route('Matcheslist')}}">Matches List</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class='fa fa-users'></i> <span>User Action</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('addAction')}}">Add Action</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class='fa fa-users'></i> <span>Team</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('AddTeam')}}">Add Team</a></li>
                    <li><a href="{{route('teamsList')}}">Team List</a></li>


                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class='fa fa-users'></i> <span>Blog</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('addPost')}}">Add blog</a></li>
                    <li><a href="{{route('blogList')}}">Blog list</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class='fa fa-users'></i> <span>Blog Categories</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('addCategory')}}">Add category</a></li>
                    <li><a href="{{route('blogCategoryList')}}">List categories</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
