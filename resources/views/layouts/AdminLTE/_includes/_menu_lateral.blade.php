<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header" style="color:#fff;"> MAIN MENU <i class="fa fa-level-down"></i></li>
			<li class="
						{{ Request::segment(1) === null ? 'active' : null }}
						{{ Request::segment(1) === 'home' ? 'active' : null }}
					  ">
				<a href="{{ route('home') }}" title="Dashboard"><i class="fa fa-dashboard"></i> <span> Dashboard</span></a>
			</li>

            @if (Auth::user()->isStudent())
                <li class="{{ Request::segment(1) === 'bot' ? 'active' : null }}">
                    <a href="{{ route('bot.tinker') }}" title="Bot Professor Virtual"><i class="fa fa-android"></i> <span> Bot Professor Virtual</span></a>
                </li>

                <li class="treeview {{ Request::segment(1) === 'learning' ? 'active menu-open' : null }}">
                    <a href="#">
                        <i class="fa fa-graduation-cap"></i>
                        <span>MEU APRENDIZADO</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::segment(1) === 'courses' ? 'active' : null }}">
                            <a href="{{ route('student.courses') }}" title="Meus Cursos"><i class="fa fa-book"></i> <span> MEUS CURSOS</span></a>
                        </li>
                        <li class="{{ Request::segment(1) === 'learning' ? 'active' : null }}">
                            <a href="{{ route('student.learning.plan') }}" title="Planos de Estudo"><i class="fa fa-calendar"></i>
                                <span> PLANOS DE ESTUDO</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

			@if(Request::segment(1) === 'profile')
                <li class="{{ Request::segment(1) === 'profile' ? 'active' : null }}">
                    <a href="{{ route('profile') }}" title="Profile"><i class="fa fa-user"></i> <span> PROFILE</span></a>
                </li>
			@endif

			<li class="treeview
				{{ Request::segment(1) === 'config' ? 'active menu-open' : null }}
				{{ Request::segment(1) === 'user' ? 'active menu-open' : null }}
				{{ Request::segment(1) === 'role' ? 'active menu-open' : null }}
				">
				<a href="#">
					<i class="fa fa-gear"></i>
					<span>SETTINGS</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					@if (Auth::user()->can('root-dev', ''))
						<li class="{{ Request::segment(1) === 'config' && Request::segment(2) === null ? 'active' : null }}">
							<a href="{{ route('config') }}" title="App Config">
								<i class="fa fa-gear"></i> <span> Settings App</span>
							</a>
						</li>
					@endif
					<li class="
						{{ Request::segment(1) === 'user' ? 'active' : null }}
						{{ Request::segment(1) === 'role' ? 'active' : null }}
						">
						<a href="{{ route('user') }}" title="Users">
							<i class="fa fa-user"></i> <span> Users</span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</section>
</aside>